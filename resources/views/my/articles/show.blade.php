@extends('layouts.my')

@section('title', '我的文章')

@section('content')

@endsection

@section('js')
	<script>
		var article = {!! $article !!};
		var tags ={!! $tags !!};
	</script>
	<script src="{{  mix('js/my.articles.index.js')  }}"></script>
@endsection

@section('css')

@endsection
