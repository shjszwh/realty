/**
 * Created by haoye on 2017/6/1.
 */
import Vue from 'vue';
import Resource from 'vue-resource';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/zh-CN';
Vue.use(Resource);
Vue.use(ElementUI, {locale})
var my = new Vue({
	el: '#my',
	data: function () {
		return {
			tags:items,
			url:URL
		}
	},
	components: {}
});
