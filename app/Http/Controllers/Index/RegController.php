<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LoginModel;
use Illuminate\Validation\Rule;
class RegController extends Controller
{
    ////登录控制器  登录页面
    public function reg(){
        
    	return view('Index.register');
    }
    public function reg_do(\App\Http\Requests\Rule $request){
        $info = $request->input();
        unset($info['password']);
        
        $res =LoginModel::create($info);
        if($res){
            // echo"注册成功";die;
            return redirect('index/login');
        }else{
            die('添加失败');
        }
       
    }
}
