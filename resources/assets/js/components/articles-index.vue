<template>
	<el-row>
		<el-col v-if="items.length" :span="24">
			<el-card class="box-card">

				<div slot="header" class="clearfix el-row" v-if="!isPublic">
					<el-breadcrumb separator="/">
						<el-breadcrumb-item><a :href="url.my.profile.show">个人中心</a></el-breadcrumb-item>
						<el-breadcrumb-item><a :href="url.my.articles.index">我的文章</a></el-breadcrumb-item>
					</el-breadcrumb>
				</div>
				<div  class="text item el-row" style="margin-bottom:10px;" v-if="!isPublic">
					<el-row>
						<el-col :span="12">
							<span style="line-height: 36px;">您一共贡献了{{articles.total}}篇文章</span>
						</el-col>
						<el-col :span="12" style="text-align: right">
							<a :href="url.my.articles.create" class="el-button el-button--primary">再写一篇</a>
						</el-col>
					</el-row>
				</div>
				<div class="text item">
					<el-table
							:data="items"

							style="width: 100%">
						<el-table-column prop="created_at" label="创作日期"></el-table-column>
						<el-table-column prop="title" label="标题"></el-table-column>
						<el-table-column prop="tags" label="标签"
						                 :filters="[{ text: '文章', value: '文章' }]"
						                 :filter-method="filterTag"
						                 filter-placement="bottom-end">
							<template scope="scope">
								<el-tag class="item"
								        v-for="tag in scope.row.tags"
								        :key="tag" :type="tag === '文章' ? 'primary' : 'success'"
								        close-transition>{{tag.title}}
								</el-tag>
							</template>
						</el-table-column>
						<el-table-column label="文件夹">
							<template scope="scope">
								<a class="el-button el-button--text"
								   :href="scope.row.dirs.path">{{scope.row.dirs.path}}</a>
							</template>
						</el-table-column>
						<el-table-column label="操作">
							<template scope="scope">
								<a :href="scope.row.showUrl" class="el-button el-button--text">查看</a>
								<a v-if="!isPublic" :href="scope.row.editUrl" class="el-button el-button--text">编辑</a>
								<a v-if="!isPublic" :href="scope.row.deleteUrl" class="el-button el-button--text">删除</a>
							</template>
						</el-table-column>
					</el-table>
				</div>
			</el-card>
		</el-col>

		<el-col v-if="!items.length" :span="24">
			<el-card class="box-card" v-if="!isPublic">
				<div slot="header" class="clearfix el-row">
					<el-col :span="12">
						<span style="line-height: 36px;">您还未撰写文章</span>
					</el-col>
					<el-col :span="12" style="text-align: right">
						<a :href="url.my.articles.create" class="el-button el-button--primary">马上写一篇</a>
					</el-col>
				</div>
				<div class="text item">
					<el-alert
							title="您还未撰写文章"
							type="warning"
							description="电脑没找到你写的文章！"
							:closable="false"
							show-icon>
					</el-alert>
				</div>
			</el-card>

			<el-card class="box-card" v-if="isPublic">
				<div slot="header" class="clearfix el-row">
					<el-col :span="12">
						<span style="line-height: 36px;">什么都没找到</span>
					</el-col>
				</div>
				<div class="text item">
					<el-alert
							title="什么都没找到"
							type="warning"
							description="我们网站还没有一篇像样的文章！"
							:closable="false"
							show-icon>
					</el-alert>
				</div>
			</el-card>
		</el-col>
	</el-row>
</template>

<script>
	export default {
		name: 'ArticlesIndex',
		props: ['items', 'articles', 'isPublic'],
		data() {
			console.log(this.isPublic);
			return {
				url: URL,
				count: 122,
			}
		},
		methods: {
			formatter(row, column) {
				return row.address;
			},
			filterTag(value, row) {
				let rs = false;
				for (let x in row.tags) {
					if (row.tags[x]['name'] == value) {
						rs = true;
					}
				}
				return rs;
			}
		}

	}
</script>
<style>
	.el-tag.item {
		margin: 2px;
	}
</style>