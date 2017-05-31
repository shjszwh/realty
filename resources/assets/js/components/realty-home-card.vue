<template>
    <el-row type="flex" class="row-bg" justify="space-around">
        <el-col :span="4" v-for="(item, index) in items" :key="index">
            <el-card :body-style="{ padding: '0px' }">
                <img :src="item.img" class="image">
                <div style="padding: 14px;">
                    <span>{{item.title}}</span>
                    <div class="bottom clearfix">
                        <time class="time">{{ currentDate }}</time>
                    </div>
                </div>
            </el-card>
        </el-col>

    </el-row>
</template>
<script>
    export default {
        data() {
            return {
                currentDate: new Date(),
                items: [
                    {
                        title: '标题1',
                        img: '/images/banner1.png',
                        con: '内容'
                    },
                    {
                        title: '标题2',
                        img: '/images/banner2.png',
                        con: '内容'
                    },
                    {
                        title: '标题3',
                        img: '/images/banner3.png',
                        con: '内容'
                    },
                    {
                        title: '标题1',
                        img: '/images/banner1.png',
                        con: '内容'
                    },
                    {
                        title: '标题2',
                        img: '/images/banner2.png',
                        con: '内容'
                    }
                ]
            };
        }
    }
</script>
<style>
    .row-bg{
        padding:40px 0;
        background: #ECEFF1;
    }
    .image{
        width:100%;
    }
</style>

