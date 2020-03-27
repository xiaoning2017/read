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
        unset($info['password']);//过滤掉确认密码   
        
    // $code = rand(1000, 9999);
    // setcookie('code', $code, time() + 600);
    // //把URL地址改成你自己就好了，把手机号码和信息模板套进去就行
    // $url = 'http://api.sms.cn/sms/ac=send&uid=qqread123&pwd=d5da6a01ae16e4091d3e18246bc0d89d&template=100000&mobile='. $user_tel . '&content={"code":"' . $code . '"}';
    // $data = array();
    // $method = 'GET';
    // $res = $this->curlPost($url, $data, $method);
    // echo $res;



        $res =LoginModel::create($info);
        if($res){
            // echo"注册成功";die;
            return redirect('index/login');
        }else{
            die('添加失败');
        }
       
    }
    /*curlpost传值  注册获取验证码*/
    public function curlPost($url, $data, $method)
    {
        $ch = curl_init(); //1.初始化
        curl_setopt($ch, CURLOPT_URL, $url); //2.请求地址
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);//3.请求方式
    //4.参数如下
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//https
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');//模拟浏览器
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: gzip, deflate'));//gzip解压内容
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        if ($method == "POST") {//5.post方式的时候添加数据
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);//6.执行
        if (curl_errno($ch)) {//7.如果出错
            return curl_error($ch);
        }
        curl_close($ch);//8.关闭
        return $tmpInfo;
    }
}
