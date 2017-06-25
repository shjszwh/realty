/**
 * Created by haoye on 2017/6/1.
 */
import Vue from 'vue';
import Resource from 'vue-resource';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/zh-CN';
import ArticlesIndex from './components/articles-index.vue';

Vue.use(Resource);
Vue.use(ElementUI, {locale})
var my = new Vue({
	el: '#my',
	data: function () {
		return {
			url: URL
		}
	},
	components: {
		ArticlesIndex
	}
});
