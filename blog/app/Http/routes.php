<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/test','IndexController@index');




//设置中间件，对未登录的用户进行过滤处理
//后台处理路由
Route::group(['middleware'=>['web','admin.login']],function(){
    Route::any('admin/login','Admin\LoginController@login');//登录页面路由
    Route::get('admin/code','Admin\LoginController@code');//二维码路由

    Route::get('admin/index','Admin\IndexController@index');//后台管理页面路由
    Route::get('admin/info','Admin\IndexController@info');
    //退出路由设置
    Route::get('admin/quit','Admin\LoginController@quit');
    //修改密码的路由
    Route::any('admin/pass','Admin\IndexController@pass');

    //资源路由分配  资源路由可以通过一条路由来操控多个方法
    //文章分类路由
    Route::resource('admin/category','Admin\CategoryController');

    //文章路由
    Route::resource('admin/article','Admin\ArticleController');
    //图片上传路由
    Route::any('admin/upload', 'Admin\CommonController@upload');

});


//友情链接的路由设置
Route::resource('admin/links','Admin\LinksController');


//前台路由
Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'Home\IndexController@index');
    Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
    Route::get('/a/{art_id}', 'Home\IndexController@article');

    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');
});
