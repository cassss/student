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
//登录页面
Route::get('/','HomeController@home_v');
//登录页面
Route::get('/login','AuthController@login_v');
//登录页面
Route::get('/login','AuthController@login_v');
//登录行为
Route::post('/login','AuthController@login');
//注册页面
Route::get('/register','AuthController@register_v');
//注册行为
Route::post('/register','AuthController@register');
//登出行为
Route::get('/logout','AuthController@logout');
