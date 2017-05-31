@extends('layouts/realty')

@section('title', '首页')

@section('content')
    <realty-carousel></realty-carousel>
    <realty-home-card></realty-home-card>
@endsection

@section('js')
    <script src="{{  mix('js/home.js')  }}"></script>
@endsection

@section('css')
<style>
    .realty-carousel {
        height: 500px;
        width: 100%;
        background-position:center center;
    }
</style>
@endsection