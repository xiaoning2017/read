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

Route::get('/', function () {
    return view('index');
});
//登录页面
Route::get("index/login","Index\LoginController@login");//登录页面
Route::post("index/login_do","Index\\LoginController@login_do");//登录页面
Route::get("index/qrcode","Index\\LoginController@qrcode");//二维码登录页面
Route::get("index/quit","Index\\LoginController@quit");//退出页面
//注册页面
Route::get("index/register","Index\\RegController@reg");//注册页面
Route::post("index/reg_do","Index\\RegController@reg_do");//注册页面
//登陆成功后首页
Route::get("index/index","Index\RegController@index");//展示页 
