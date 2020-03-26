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
Route::get("Index/login","Index\\LoginController@login");//登录页面
Route::post("Index/login_do","Index\\LoginController@login_do");//登录页面
Route::get("Index/quit","Index\\LoginController@quit");//登录页面
