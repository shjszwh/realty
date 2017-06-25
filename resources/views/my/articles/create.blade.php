@extends('layouts.my')

@section('title', '我的文章')

@section('content')
	<articles-create
			:post-url="url.my.articles.store"
	        :breadcrumb="breadcrumb"
	        :data="data"
	>

	</articles-create>
@endsection

@section('js')
	<script src="{{  mix('js/my.articles.create.js')  }}"></script>
@endsection

@section('css')

@endsection
