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
Route::get('/','TopController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'] , function(){
Route::get('/select','CategoryController@index');
Route::resource('/select.tasks', 'TaskController',['except'=>['delete']]);
Route::delete('/tasks/{task}', 'TaskController@destory');
});
