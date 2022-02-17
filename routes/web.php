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
//　トップ画面　→　使ってみるのページ
Route::get('/','TopController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// バナーが表示されているページ
Route::get('/select','CategoryController@index');






Route::resource('/tasks', 'TaskController',['except'=>['delete']]);

Route::get('/category/{category}/','TaskController@category');

Route::delete('/tasks/{task}', 'TaskController@destory');

