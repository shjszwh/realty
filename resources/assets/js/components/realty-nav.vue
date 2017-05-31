<template>
    <el-menu default-active="1" class="el-menu-demo" mode="horizontal">
        <li><logo></logo></li>
        <el-menu-item index="1"><a href="/"><i class="el-icon-star-off"></i>首页</a></el-menu-item>
        <el-menu-item index="2"><a href="/tags"><i class="el-icon-date"></i>标签</a></el-menu-item>
        <el-menu-item index="3"><a href="/articles"><i class="el-icon-document"></i>文章</a></el-menu-item>
        <el-menu-item index="4"><a href="/celebrities">人物</a></el-menu-item>
    </el-menu>
</template>

<script>
    import Logo from './realty-logo.vue'
    export default {
        name: 'RealtyNav',
        data:function(){
            return {

            };
        },
        components: {
            Logo
        },
    }
</script>

<style>

</style>
