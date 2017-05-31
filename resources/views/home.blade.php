@extends('layouts/realty')

@section('title', '首页')

@section('content')
    <realty-carousel></realty-carousel>
@endsection

@section('js')
    <script src="{{  mix('js/home.js')  }}"></script>
@endsection