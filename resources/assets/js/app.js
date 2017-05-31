import Vue from 'vue'
import Jquery from 'jquery'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/zh-CN'
import RealtyNav from './components/realty-nav.vue'

Vue.use(ElementUI, { locale })

const realty = new Vue({
    el: '#realty',
    components: {
        RealtyNav
    },
});
