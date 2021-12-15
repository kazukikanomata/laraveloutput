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

Route::get('/', 'PostController@index');
Route::get('posts/create', 'PostController@create');
Route::get('/posts/{task}', 'PostController@show');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{task}/edit', 'PostController@edit');
Route::put('/posts/{task}', 'PostController@update');
Route::delete('/posts/{task}', 'PostController@delete')->name('task_remove');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
