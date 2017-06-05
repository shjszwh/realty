<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
dd($_SERVER);
//顶层
Route::group([], function () {
    Route::resource('/', 'HomeController', ['only' => ['index']]);
    Route::resource('tags', 'TagsController');
    Route::resource('articles', 'ArticlesController');
    Route::resource('celebrities', 'CelebritiesController');

});