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
Route::get('/','App\HTTP\Controllers\TopController@index');

Route::get('/home', 'App\HTTP\Controllers\HomeController@index')->name('home');


// バナーが表示されているページ



    Route::get('/categories','App\HTTP\Controllers\CategoryController@index')->name('categories.index');
    // タスク作成画面
    Route::get('/tasks/create','App\HTTP\Controllers\TaskController@create')->name('tasks.create');
    // タスク保存画面
    Route::post('/tasks','App\HTTP\Controllers\TaskController@store')->name('tasks.store');
    //　選択されたカテゴリーの個別詳細ページ
    Route::get('/categories/tasks/{task}','App\HTTP\Controllers\TaskController@show')->name('tasks.show');
    // タスク編集
    Route::get('/tasks/{task}/edit','App\HTTP\Controllers\TaskController@edit')->name('tasks.edit');
    // タスク更新
    Route::put('/tasks/{task}','App\HTTP\Controllers\TaskController@update')->name('tasks.update');
    // タスク削除
    Route::delete('/tasks/{task}', 'App\HTTP\Controllers\TaskController@destory')->name('tasks.destory');


// ソーシャル・ログイン
Route::prefix('login/{provider}')->where(['provider' => '(line|github)'])->group(function(){

    Route::get('/', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('social_login.redirect');
    Route::get('/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback')->name('social_login.callback');

});