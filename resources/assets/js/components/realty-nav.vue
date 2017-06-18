<template>
    <el-menu default-active="1" class="el-menu-demo" mode="horizontal">
        <li>
            <logo></logo>
        </li>
        <el-menu-item index="1"><a href="/"><i class="el-icon-star-off"></i>首页</a></el-menu-item>
        <el-menu-item index="2"><a href="/tags"><i class="el-icon-date"></i>标签</a></el-menu-item>
        <el-menu-item index="3"><a href="/articles"><i class="el-icon-document"></i>文章</a></el-menu-item>
        <el-menu-item index="4"><a href="/celebrities">人物</a></el-menu-item>

        <li class="el-menu-item pull-right" v-if="auth_guest">
            <a :href="login_url">登录</a>
        </li>

        <li class="el-menu-item pull-right" v-if="auth_guest">
            <a :href="register_url">注册</a>
        </li>

        <li class="el-menu-item pull-right" v-if="!auth_guest">
            <a>欢迎{{user_name}}</a>
        </li>

        <li class="el-menu-item pull-right" v-if="!auth_guest">
            <a @click="logout(event)">安全退出</a>
            <form id="logout-form" :action="logout_url" method="POST"
                  style="display: none;">
                <input type="hidden" name="_token" v-model="csr_token">
            </form>
        </li>

    </el-menu>
</template>

<script>
    import Logo from './realty-logo.vue'
    export default {
        name: 'RealtyNav',
        data: function () {
            return {
                auth_guest: STATUS.auth_guest,
                login_url: URL.login,
                register_url: URL.register,
                logout_url: URL.logout,
                csr_token: USER.csrf_token,
                user_name:USER.name,
            };
        },
        methods: {
            logout: function () {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            }
        },

        components: {
            Logo
        },
    }
</script>

<style>
    .el-menu--horizontal .el-menu-item.pull-right:{
    float: right;
}
</style>
