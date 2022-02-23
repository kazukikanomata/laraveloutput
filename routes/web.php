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
//　トップ画面
Route::get('/','TopController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// バナーが表示されているページ
Route::get('/categories','CategoryController@index')->name('categories.index');
// 選択されたカテゴリーが表示されているページ
Route::get('/categories/{category}','CategoryController@show')->name('categories.show');

Route::get('/tasks/create','TaskController@create')->name('tasks.create');

Route::post('/categories/{category}/tasks/','TaskController@store')->name('tasks.store');

Route::get('/categories/{category}/tasks/{task}','TaskController@show')->name('tasks.show');

Route::get('/categories/{category}/tasks/{task}/edit','TaskController@edit')->name('tasks.edit');

Route::delete('/tasks/{task}', 'TaskController@destory')->name('tasks.destory');

