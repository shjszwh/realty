<template>
    <div class="realty-boot">
        <el-tag type="primary" class="realty-links-tag" v-for="(item,index) in tags" :key="index">
            <a :href="item.url">{{item.name}}</a>
        </el-tag>
        <p class="boot-text">打造中国最优秀的采购知识分享平台。</p>
    </div>
</template>

<script>
    import Logo from './realty-logo.vue'
    export default {
        name: 'RealtyBoot',
        data: function () {
            let tags = [];
            for (let i = 0; i < 50; i++) {
                tags.push({name: '第' + i + '号', url: '/tags/' + i});
            }
            return {
                tags: tags
            };
        },
        components: {
            Logo
        },
    }
</script>

<style>
    .realty-boot {
        width: 100%;
        background: #f6f6f6;
        border-top: #ccc 5px solid;
        padding: 20px 10px;
        margin-bottom: -5px;
        margin-right: -5px;
    }

    .realty-links-tag {
        margin-bottom: 5px;
        margin-right: 5px;
    }

    .realty-links-tag a{
        color: #20a0ff;
        text-decoration: none;
    }
    .boot-text{
        text-align: center;
        color: #ccc;
    }

</style>
