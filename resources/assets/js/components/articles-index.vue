<template>
	<el-table
			:data="articles"
			v-if="articles.length"
			style="width: 100%">
		<el-table-column prop="date" label="日期"></el-table-column>
		<el-table-column prop="title" label="标题"></el-table-column>
		<el-table-column prop="tag" label="标签TOP3"
		                 :filters="[{ text: '文章', value: '文章' }]"
		                 :filter-method="filterTag"
		                 filter-placement="bottom-end">
			<template scope="scope">
				<el-tag v-for="tag in scope.row.tags" :type="tag === '家' ? 'primary' : 'success'"
				        close-transition>{{tag}}
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
</template>

<script>
	export default {
		name: 'ArticlesIndex',
		data() {
			return {
				articles: [{
					date: '2016-05-02',
					name: '王小虎',
					title: '上海市普陀区金沙江路 1518 弄',
					tags: ['文章(200)', '文章2', '文章3'],
					dirs: ['中文', '目录1', '随笔'],
					dirUrl: '/my/my-dirs/1',
					editUrl: 'my/my-articles/1/edit',
					deleteUrl: '/my/my-articles/1',
					showUrl: '/my/my-articles/1'
				}, {
					date: '2016-05-04',
					name: '王小虎',
					title: '上海市普陀区金沙江路 1517 弄',
					tags: ['文章', '文章2', '文章3'],
					dirs: ['中文', '目录1', '随笔'],
					dirUrl: '/my/my-dirs/1',
					editUrl: 'my/my-articles/1/edit',
					deleteUrl: '/my/my-articles/1',
					showUrl: '/my/my-articles/1'
				}, {
					date: '2016-05-01',
					name: '王小虎',
					title: '上海市普陀区金沙江路 1519 弄',
					tags: ['目录', '目录2', '目录3'],
					dirs: ['中文', '目录1', '随笔'],
					dirUrl: '/my/my-dirs/1',
					editUrl: 'my/my-articles/1/edit',
					deleteUrl: '/my/my-articles/1',
					showUrl: '/my/my-articles/1'
				}, {
					date: '2016-05-03',
					name: '王小虎',
					title: '上海市普陀区金沙江路 1516 弄',
					tags: ['目录', '目录2', '目录3'],
					dirs: ['中文', '目录1', '随笔'],
					dirUrl: '/my/my-dirs/1',
					editUrl: 'my/my-articles/1/edit',
					deleteUrl: '/my/my-articles/1',
					showUrl: '/my/my-articles/1'
				}]
			}
		},
		methods: {
			formatter(row, column) {
				return row.address;
			},
			filterTag(value, row) {
				return row.tag === value;
			}
		}

	}
</script>