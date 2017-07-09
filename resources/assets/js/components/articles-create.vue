<template>
    <el-row>
        <el-col :span="24">
            <el-card class="box-card">
                <div slot="header" class="clearfix el-row">
                    <el-breadcrumb separator="/">
                        <el-breadcrumb-item><a :href="url.my.profile.show">个人中心</a></el-breadcrumb-item>
                        <el-breadcrumb-item><a :href="url.my.articles.index">我的文章</a></el-breadcrumb-item>
                        <el-breadcrumb-item><a :href="breadcrumb.url">{{breadcrumb.name}}</a></el-breadcrumb-item>
                    </el-breadcrumb>
                </div>
                <div class="text item">
                    <el-form ref="form" :model="form" label-width="80px">
                        <el-form-item label="文章标题">
                            <el-input v-model="form.title"></el-input>
                        </el-form-item>
                        <el-form-item label="文章标签">
                            <el-tag
                                    type="success"
                                    :key="tag"
                                    v-for="tag in form.tags"
                                    :closable="true"
                                    :close-transition="false"
                                    @close="handleClose(tag)"
                            >
                                {{tag}}
                            </el-tag>
                            <el-input
                                    class="input-new-tag"
                                    style="width: 160px;"
                                    v-if="inputVisible"
                                    v-model="newTagValue"
                                    ref="saveTagInput"
                                    @keyup.enter.native="handleInputConfirm"
                                    @blur="handleInputConfirm"
                            >
                            </el-input>
                            <el-button v-if="!inputVisible" @click="showInput">+ 标签</el-button>
                        </el-form-item>
                        <el-form-item label="文件夹">
                            <el-row style="margin-bottom: 10px;" v-if="this.dirTexts.length">
                                <el-button :key="path" v-for="path in dirTexts">{{path}}</el-button>
                            </el-row>
                            <el-tree
                                    check-strictly
                                    :data="myDirs"
                                    show-checkbox
                                    node-key="id"
                                    ref="tree"
                                    highlight-current
                                    @check-change="changeTree"
                                    :props="dirDefaultProps">
                            </el-tree>
                        </el-form-item>
                        <el-form-item label="文章正文">
                            <vue-editor :editorToolbar="customToolbar" v-model="form.content"></vue-editor>
                        </el-form-item>
                        <el-form-item>
                            <el-button :loading="sending" type="primary" @click="onSubmit">立即创建</el-button>
                            <el-button>取消</el-button>
                        </el-form-item>
                    </el-form>
                </div>
            </el-card>
        </el-col>
    </el-row>
</template>

<script>
    import {VueEditor} from 'vue2-editor';

    export default {
        name: 'ArticlesCreate',
        props: ['breadcrumb', 'postUrl', 'data'],
        data() {
            let form = {
                title: '',
                tags: [],
                dirs: [],
            };
            if (this.data) {
                form = this.data;
            }
            return {
                dirDefaultProps: {
                    children: 'children',
                    label: 'label'
                },
                sending: false,
                dirTexts: [],
                customToolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{'list': 'ordered'}, {'list': 'bullet'}],
                    [{'indent': '-1'}, {'indent': '+1'}],
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    [{'color': []}, {'background': []}],
                    [{'font': []}],
                    [{'align': []}],
                    ['clean']
                ],
                myDirs: [{
                    id: 1,
                    label: '一级 1',
                    path: ['dir1'],
                    children: [{
                        id: 4,
                        label: '二级 1-1',
                        path: ['dir1', 'dir1-1'],
                        children: [{
                            id: 9,
                            label: '三级 1-1-1',
                            path: ['dir1', 'dir1-1', 'dir1-1-1']
                        }, {
                            id: 10,
                            label: '三级 1-1-2',
                            path: ['dir1', 'dir1-1', 'dir1-1-2']
                        }]
                    }]
                }],
                newTagValue: '',
                inputVisible: false,
                url: URL,
                form: form
            }
        },
        methods: {
            onSubmit: function () {
                let self = this;
                if (self.sending) {
                    return false;
                }
                self.sending = true;
                self.form._token = USER.csrf_token;
                self.$http.post(this.url.my.articles.store, this.form).then(function (response) {
                    if (response.body && response.body.status == 'success') {
                        this.$message(response.body.message);
                        setTimeout(function () {
                            location.href = URL.my.articles.index;
                        }, 2000);
                    }
                }, function (a, b, c) {
                    this.$message('保存失败');
                    self.sending = false;
                });
            },
            handleClose(tag) {
                this.form.tags.splice(this.form.tags.indexOf(tag), 1);
            },
            showInput() {
                this.inputVisible = true;
                this.$nextTick(_ => {
                    this.$refs.saveTagInput.$refs.input.focus();
                });
            },

            handleInputConfirm() {
                let newTagValue = this.newTagValue;
                if (newTagValue && (this.form.tags.indexOf(newTagValue) == -1)) {
                    this.form.tags.push(newTagValue);
                }
                this.inputVisible = false;
                this.newTagValue = '';
            },
            changeTree(data){
                let dirs = this.$refs.tree.getCheckedNodes();
                this.selectDirs = dirs;
                this.displayDirs();
                this.formDirs();
            },
            displayDirs(){
                this.dirTexts = this.selectDirs.map(dir => {
                    return dir.path.join('/');
                });
            },
            formDirs(){
                this.form.dirs = this.selectDirs.map(dir => {
                    return dir.id;
                });
            }
        },
        components: {
            VueEditor
        }
    }
</script>
<style>
    .el-tag {
        margin: 2px;
    }

</style>