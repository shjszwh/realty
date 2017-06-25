/**
 * Created by haoye on 2017/6/1.
 */
import Vue from 'vue';
import Resource from 'vue-resource';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/zh-CN';
Vue.use(Resource);
Vue.use(ElementUI, {locale})

import ArticlesCreate from './components/articles-create.vue';

var my = new Vue({
	el: '#my',
	data: function () {
		return {
			url: URL,
			data:null,
			breadcrumb:{
				name:'新增文章',
				url:URL.my.articles.create
			}
		}
	},
	components: {
		ArticlesCreate
	}
});
