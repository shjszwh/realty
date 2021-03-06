@extends('layouts.my')

@section('title', '我的文章')

@section('content')
	<articles-index :items="items" :articles="articles"></articles-index>
@endsection

@section('js')
	<script>
		var articles = {!! $articles !!};
		var items ={!! $items !!};
		console.log(articles, items);
	</script>
	<script src="{{  mix('js/my.articles.index.js')  }}"></script>
@endsection

@section('css')

@endsection
