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
//　ホーム画面
Route::get('/','PostController@top');
Route::get('/select','PostController@select');
Route::get('/tasks', 'PostController@index');
Route::resource('posts','PostController', ['except'=>['delete']]);
//Route::get('posts/create', 'PostController@create');
//Route::get('/posts/{task}', 'PostController@show');
//Route::post('/posts', 'PostController@store');
//Route::get('/posts/{task}/edit', 'PostController@edit');
//Route::put('/posts/{task}', 'PostController@update');
Route::delete('/posts/{task}', 'PostController@destory');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
