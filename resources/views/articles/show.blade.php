@extends('layouts.realty')

@section('title', '我的文章')

@section('content')
	<el-row type="flex" class="row-bg" justify="center">
		<el-card class="box-card" style="width: 1200px;margin-top:20px;">
			<div slot="header" class="clearfix">
				<h2>@{{article.title}}</h2>
			</div>
			<div class="text item">
				<el-row type="flex" class="row-bg" justify="space-between">
					<el-col :span="6">
						<div class="grid-content bg-purple">作者：@{{author.name}}</div>
					</el-col>
					<el-col :span="12">

					</el-col>
					<el-col :span="6">
						<div class="grid-content bg-purple-light">创作时间：@{{author.created_at}}</div>
					</el-col>
				</el-row>
			</div>
			<div class="text item">
				标签:
				<el-tag class="item"
				        v-for="tag in tags"
				        :key="tag" :type="tag === '文章' ? 'primary' : 'success'"
				        close-transition>@{{tag.title}}
				</el-tag>
			</div>
			<div class="text item">
			<el-tag
					class="input-new-tag primary"
					:key="tag"
					v-for="tag in dynamicTags"
					:closable="true"
					:close-transition="false"
			@close="handleClose(tag)"
			>
			@{{tag}}
			</el-tag>
			<el-input
					class="input-new-tag"
					v-if="inputVisible"
					v-model="inputValue"
					ref="saveTagInput"
					size="mini"
					@keyup.enter.native="handleInputConfirm"
					@blur="handleInputConfirm"
			>
			</el-input>
			<el-button v-else class="button-new-tag success" size="small" @click="showInput">+ 新增标签</el-button>

			</div>
			<div class="text item">
				@{!! article !!}
			</div>
		</el-card>
	</el-row>

@endsection

@section('js')
	<script>
		var article = {!! $article !!};
		var tags ={!! $tags !!};
		var author = {!! $author !!};
		var content = {!! $content !!}
		console.log(article, tags, author);
	</script>
	<script src="{{  mix('js/articles.show.js')  }}"></script>
@endsection

@section('css')

@endsection
