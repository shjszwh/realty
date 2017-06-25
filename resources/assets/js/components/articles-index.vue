<template>
	<el-row>
		<el-col v-if="articles.length" :span="24">
			<el-card class="box-card">

				<div slot="header" class="clearfix el-row">
					<el-breadcrumb separator="/">
						<el-breadcrumb-item><a :href="url.my.profile.show">个人中心</a></el-breadcrumb-item>
						<el-breadcrumb-item><a :href="url.my.articles.index">我的文章</a></el-breadcrumb-item>
					</el-breadcrumb>
				</div>
				<div class="text item el-row" style="margin-bottom:10px;">
					<el-row>
						<el-col :span="12">
							<span style="line-height: 36px;">您一共贡献了{{count}}篇文章</span>
						</el-col>
						<el-col :span="12" style="text-align: right">
							<a :href="url.my.articles.create" class="el-button el-button--primary">再写一篇</a>
						</el-col>
					</el-row>
				</div>
				<div class="text item">
					<el-table
							:data="articles"

							style="width: 100%">
						<el-table-column prop="date" label="创作日期"></el-table-column>
						<el-table-column prop="title" label="标题"></el-table-column>
						<el-table-column prop="tag" label="标签TOP3"
						                 :filters="[{ text: '文章', value: '文章' }]"
						                 :filter-method="filterTag"
						                 filter-placement="bottom-end">
							<template scope="scope">
								<el-tag class="item"
								        v-for="tag in scope.row.tags"
								        :key="tag" :type="tag === '文章' ? 'primary' : 'success'"
								        close-transition>{{tag.name}}({{tag.number}})
								</el-tag>
							</template>
						</el-table-column>
						<el-table-column label="文件夹">
							<template scope="scope">
								<a class="el-button el-button--text" :href="scope.row.dirUrl">{{scope.row.dirs.join('/')}}</a>
							</template>
						</el-table-column>
						<el-table-column label="操作">
							<template scope="scope">
								<a :href="scope.row.showUrl" class="el-button el-button--text">查看</a>
								<a :href="scope.row.editUrl" class="el-button el-button--text">编辑</a>
								<a :href="scope.row.deleteUrl" class="el-button el-button--text">删除</a>
							</template>
						</el-table-column>
					</el-table>
				</div>
			</el-card>
		</el-col>

		<el-col v-if="!articles.length" :span="24">
			<el-card class="box-card">
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
		</el-col>
	</el-row>
</template>

<script>
	export default {
		name: 'ArticlesIndex',
		data() {
			return {
				url: URL,
				count: 122,
				articles: [
					{
						date: '2016-05-02',
						name: '王小虎',
						title: '上海市普陀区金沙江路 1518 弄',
						tags: [{number: 12, name: '文章'}, {number: 12, name: '文章2'}, {number: 12, name: '目录'}],
						dirs: ['中文', '目录1', '随笔'],
						dirUrl: '/my/my-dirs/1',
						editUrl: 'my/my-articles/1/edit',
						deleteUrl: '/my/my-articles/1',
						showUrl: '/my/my-articles/1'
					}, {
						date: '2016-05-04',
						name: '王小虎',
						title: '上海市普陀区金沙江路 1517 弄',
						tags: [{number: 12, name: '文章'}, {number: 12, name: '文章2'}, {number: 12, name: '目录'}],
						dirs: ['中文', '目录1', '随笔'],
						dirUrl: '/my/my-dirs/1',
						editUrl: 'my/my-articles/1/edit',
						deleteUrl: '/my/my-articles/1',
						showUrl: '/my/my-articles/1'
					}, {
						date: '2016-05-01',
						name: '王小虎',
						title: '上海市普陀区金沙江路 1519 弄',
						tags: [{number: 12, name: '文章'}, {number: 12, name: '文章2'}, {number: 12, name: '目录'}],
						dirs: ['中文', '目录1', '随笔'],
						dirUrl: '/my/my-dirs/1',
						editUrl: 'my/my-articles/1/edit',
						deleteUrl: '/my/my-articles/1',
						showUrl: '/my/my-articles/1'
					}, {
						date: '2016-05-03',
						name: '王小虎',
						title: '上海市普陀区金沙江路 1516 弄',
						tags: [{number: 12, name: '文章'}, {number: 12, name: '文章2'}, {number: 12, name: '目录'}],
						dirs: ['中文', '目录1', '随笔'],
						dirUrl: '/my/my-dirs/1',
						editUrl: 'my/my-articles/1/edit',
						deleteUrl: '/my/my-articles/1',
						showUrl: '/my/my-articles/1'
					}
				]
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