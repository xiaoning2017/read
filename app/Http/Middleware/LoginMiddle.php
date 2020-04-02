<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('user')){
            echo "<script>alert('请先登录或注册，点击返回首页...');location.href='/'</script>";die;
            // echo"请先登录或注册 正在回到主页";
            // return redirect('/');
        }
        return $next($request);
    }
}
