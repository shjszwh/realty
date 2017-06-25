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
	el: '#container',
	data: function () {
		return {
			article: article,
			tags: tags,
			author: author,
			url: URL,
			inputVisible: false,
			newTagValue: '',
			dynamicTags: ['标签一', '标签二', '标签三'],
			inputVisible: false,
			inputValue: '',

		}
	},
	methods: {
		handleClose(tag) {
			this.dynamicTags.splice(this.dynamicTags.indexOf(tag), 1);
		},

		showInput() {
			this.inputVisible = true;
			this.$nextTick(_ => {
				this.$refs.saveTagInput.$refs.input.focus();
			});
		},

		handleInputConfirm() {
			let inputValue = this.inputValue;
			if (inputValue) {
				this.dynamicTags.push(inputValue);
			}
			this.inputVisible = false;
			this.inputValue = '';
		}
	},
	components: {
		ArticlesIndex
	}
});
