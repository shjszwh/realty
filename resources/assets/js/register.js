/**
 * Created by haoye on 2017/6/1.
 */
import Vue from 'vue';
import Resource from 'vue-resource';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/zh-CN';
Vue.use(Resource);
Vue.use(ElementUI, {locale})
const container = new Vue({
    el: '#container',
    data: function () {
        return {
            labelPosition:'right'
        }
    },
    components: {}
});
