@extends('layouts.realty')

@section('title', '文章')

@section('content')
	<articles-index :items="items" :articles="articles" :is-public="true"></articles-index>
@endsection

@section('js')
	<script>
		var articles = {!! $articles !!};
		var items ={!! $items !!};
		console.log(articles, items);
	</script>
	<script src="{{  mix('js/articles.index.js')  }}"></script>
@endsection

@section('css')

@endsection
