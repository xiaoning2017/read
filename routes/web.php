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


//商品页面
Route::prefix('book')->middleware('LoginMiddle')->group(function(){
    Route::get('create','Book\BookController@create');//作者添加
    Route::get('index','Book\BookController@index');//主页面
    Route::post('search','Book\BookController@search');//搜索分类页面
    Route::any('writer','Book\BookController@writer');//作者添加页面
    Route::post('add_do','Book\BookController@add_do');//作者添加跳转
});
