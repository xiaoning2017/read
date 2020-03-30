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
        $res=LoginModel::where(['user_tel'=>$info['user_tel']])->first();
        
        // $res =LoginModel::create($info);
        // $res = DB::select("select * from login_tel where user_tel='$info[user_tel]' and user_pwd='$info[user_pwd]' limit 1");
        // $a = $res->user_tel;
       
        if(!empty($res)){ 
            if($info['user_pwd'] != $res->user_pwd){
                return redirect('index/login')->with('msg','看看是不是密码错了？');
            }else{
                session(['user'=>$res['user_tel']]);
                return redirect('index/index');
            }
        }else{
            // 都能用echo "<script>alert('用户名错了，请去注册，正在返回首页...');location.href='/'</script>";die;
            return redirect('index/login')->with('msg','手机号错了');
            
        }       
    }
    /**点击扫码登录 */
    public function qrcode(Request $request){
        $url = storage_path('app/public/phpqrcode.php');
        include($url);
        // include '/phpqrcode.php';
        //区分是谁登录的，生成一个唯一的用户标识 
        $uid = uniqid();         
        // echo $uid;die;
        $url = "http://readzhaohe.dongjiayi.top/index/qrcode?uid = ".$uid;
        $obj = new QrCode();
        $obj->png($url,'./1.png');

        // return view('Index.qrcode');
    }
    /*点击退出*/ 
    public function quit(){
        session(['user'=>null]);
        return redirect('/');
    }
}
