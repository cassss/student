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
//课程列表页面
Route::get('/','ClassController@class_v');
//课程列表页面
Route::get('/class','ClassController@class_v');
//课程内容页面
Route::get('/class/{class}','ClassController@class_c_v')->where('class', '[0-9]+');;
//登录页面
Route::get('/login','AuthController@login_v');
//登录页面
Route::get('/login','AuthController@login_v');
//登录行为
Route::post('/login','AuthController@login');
//用户界面
//注册页面
Route::get('/user','AuthController@user_v');
//注册页面
Route::get('/register','AuthController@register_v');
//注册行为
Route::post('/register','AuthController@register');
//登出行为
Route::get('/logout','AuthController@logout');
//后台登录
Route::get('/admin','AuthController@logout');
