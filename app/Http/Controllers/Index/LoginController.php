<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LoginModel;
use Illuminate\Validation\Rule;
use DB;
use BaconQrCode\Encoder\QrCode;
class LoginController extends Controller
{
    ////登录控制器  登录页面
    public function login(){
    	return view('Index.login');
    }
    public function login_do(Request $request){
        $info = $request->all();
        // $res=LoginModel::where('user_tel',$info['user_tel'] and 'user_pwd', $info['user_pwd'])->first();
        // $res =LoginModel::create($info);
        $res = DB::select("select * from login_tel where user_tel='$info[user_tel]' and user_pwd='$info[user_pwd]' limit 1");
        if($res){
            
            return redirect('/');
        }else{
            echo "登录失败";die;
            // die('登录失败');
        }       
    }
    /**点击扫码登录 */
    public function qrcode(Request $request){
        $url = storage_path('app/public/phpqrcode.php');
        include($url);
        // include '/phpqrcode.php';
        //区分是谁登录的，生成一个唯一的用户标识 
        $uid = uniqid();
        echo $uid;die;
        $obj = new QRcode();

        // return view('Index.qrcode');
    }
    /*点击退出*/ 
    public function quit(){
        session(['user'=>null]);
        return redirect('index/login');
    }
}
