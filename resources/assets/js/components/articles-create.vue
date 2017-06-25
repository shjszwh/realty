<template>
	<el-row>
		<el-col :span="24">
			<el-card class="box-card">
				<div slot="header" class="clearfix el-row">
					<el-breadcrumb separator="/">
						<el-breadcrumb-item><a :href="url.my.profile.show">个人中心</a></el-breadcrumb-item>
						<el-breadcrumb-item><a :href="url.my.articles.index">我的文章</a></el-breadcrumb-item>
						<el-breadcrumb-item><a :href="breadcrumb.url">{{breadcrumb.name}}</a></el-breadcrumb-item>
					</el-breadcrumb>
				</div>
				<div class="text item">

				</div>
			</el-card>
		</el-col>
	</el-row>
</template>

<script>
	export default {
		name: 'ArticlesCreate',
		props: ['breadcrumb', 'postUrl','data'],
		data() {
			let formData = {};
			if (this.data) {
				formData = this.data;
			}
			return {
				url: URL,
				formData: formData
			}
		},
		methods: {

		}
	}
</script>
<style>
	.el-tag.item {
		margin: 2px;
	}
</style>