@extends('layouts.my')

@section('title', '我的文章')

@section('content')
	<articles-index></articles-index>
@endsection

@section('js')
	<script src="{{  mix('js/my.articles.index.js')  }}"></script>
@endsection

@section('css')

@endsection
