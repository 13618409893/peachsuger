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
use App\Entity\Member;

//登录页面路由
Route::get('/', function () {
    return view('login');
});


Route::get('/login', 'View\MemberController@toLogin');

//注册页面路由
Route::get('/register', 'View\MemberController@toRegister');

//二维码路由设置
Route::any('service/validate_code/create', 'Service\ValidateController@create');

Route::any('service/validate_phone/send', 'Service\ValidateController@sendSMS');

Route::any('service/validate_email', 'Service\ValidateController@validateEmail');

Route::post('service/register', 'Service\MemberController@register');
