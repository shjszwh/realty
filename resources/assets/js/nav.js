import Vue from 'vue'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/zh-CN'
Vue.use(ElementUI, {locale})
const myNav = new Vue({
	el: '#myNav',
	data: function () {
		return {
			url:URL
		}
	},
	components: {}
});
