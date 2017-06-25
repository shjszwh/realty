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
//顶层
Route::group([], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index');
	Route::resource('tags', 'TagsController', ['only' => ['index', 'show']]);
	Route::resource('articles', 'ArticlesController', ['only' => ['index', 'show']]);
	Route::resource('celebrities', 'CelebritiesController', ['only' => ['index', 'show']]);
});

Route::group(['middleware' => 'auth', 'namespace' => 'My', 'prefix' => 'my'], function () {
	Route::get('/', 'ProfileController@edit')->name('profile');
	Route::post('/', 'ProfileController@update')->name('profileApi');
	Route::resource('my-tags', 'TagsController');
	Route::resource('my-dirs', 'DirsController');
	Route::resource('my-articles', 'ArticlesController');
	Route::resource('my-celebrities', 'CelebritiesController');
});
Auth::routes();