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

Auth::routes();

//用户管理
Route::get('/logout', 'Auth\LoginController@logout');



//主页
Route::get('/', 'HomeController@index');

//显示文章
Route::get('article/{id}','ArticleController@show');

//管理文章列表
Route::group([
    'middleware'=>'auth',
    'namespace'=>'Admin',
    'prefix'=>'admin'
],function(){
    Route::get('/','HomeController@index');
    Route::resource('article', 'ArticleController');
    Route::resource('comment','CommentController');
});
Route::post('admin/article/update/{id}','Admin\ArticleController@update');

Route::post('admin/comment/update/{id}','Admin\CommentController@update');



//评论增加
Route::post('comment','CommentController@store');


//测试路由
Route::any('upload', 'TestController@uploadImages');
Route::get('phpword','PhpworkController@index');





