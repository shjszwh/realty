import Vue from 'vue'
import Jquery from 'jquery'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/zh-CN'
import RealtyNav from './components/realty-nav.vue'
import RealtyBoot from './components/realty-boot.vue'
Vue.use(ElementUI, {locale})

const realtyNav = new Vue({
    el: '#realtyNav',
    components: {
        RealtyNav
    },
});

const realtyBoot = new Vue({
    el: '#realtyBoot',
    components: {
        RealtyBoot
    },
});
