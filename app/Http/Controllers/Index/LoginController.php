<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    ////登录控制器  登录页面
    public function login(){
    	return view('Index.login');
    }
    public function login_do(Request $request){        
        
        $info = $request->all();
        // var_dump($info);
        $data = AdminModel::where(['user_name'=>$info['user_name']])->first();
        // dd($data);
        if(!empty($data)){
            $pwd = decrypt($data->user_pwd);//解密后的密码
            if($info['user_pwd'] != $pwd){
                return redirect('login/login')->with('msg','看看是不是密码错了？');
            }else{
                session(['user'=>$data]);
                return redirect('admin/index');
            }
        }else{
            return redirect('login/login')->with('msg','不存在此用户。不允许访问');
        }	
    }
    /*点击退出*/ 
    public function quit(){
        session(['user'=>null]);
        return redirect('login/login');
    }
}
