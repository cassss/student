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
Route::get('/class/{class}','ClassController@class_c_v')->where('class', '[0-9]+');
//课件资料列表
Route::get('/datas','ClassController@datas_v');
//登录页面
Route::get('/login','AuthController@login_v')->name('login');
//登录行为
Route::post('/login','AuthController@login');
//注册页面
Route::get('/register','AuthController@register_v');
//注册行为
Route::post('/register','AuthController@register');
//后台登录页面
Route::get('/admin/login','AdminController@login_v');
//后台登录行为
Route::post('/admin/login','AdminController@login');
//用户登录权限
Route::middleware(['auth'])->group(function () {
    //用户界面
    Route::get('/user','AuthController@user_v');
    //登出行为
    Route::get('/logout','AuthController@logout');
    //后台用户登录权限
    Route::middleware(['root'])->prefix('admin')->group(function () {
        //后台主界面
        Route::get('/','AdminController@admin');
        //添加教师页面
        Route::get('/newteacher','AdminController@newteacher_v');
        //添加教师方法
        Route::post('/newteacher','AdminController@newteacher');
        //教师列表页面
        Route::get('/teachers','AdminController@teachers_v');
        //添加课程页面
        Route::get('/newclass','AdminController@newclass_v');
        //添加课程方法
        Route::post('/newclass','AdminController@newclass');
        //课程section列表页面
        Route::get('/class/{class}','AdminController@sections_v')->where('class', '[0-9]+');
        //section内容页面
        Route::get('/section/{section}','AdminController@section_v')->where('section', '[0-9]+');
        //添加section页面
        Route::get('/class/{class}/newsection','AdminController@newsection_v')->where('class', '[0-9]+');
        //添加section方法
        Route::post('/class/{class}/newsection','AdminController@newsection')->where('class', '[0-9]+');
        //添加课件页面
        Route::get('/newdata','AdminController@newdata_v');
        //添加课件方法
        Route::post('/newdata','AdminController@newdata');
    });
});
