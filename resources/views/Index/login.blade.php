<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">H</h1>
            </div>
            <h3>你给我翻译翻译</h3>
            <h3>什么叫惊喜</h3>

            <form class="m-t" role="form" action="{{url('login/login_do')}}" method="post">
                <div class="form-group">
                    <input type="text" name="user_name" class="form-control" placeholder="用户名" >
                </div>
                <div class="form-group">
                    <input type="password" name="user_pwd" class="form-control" placeholder="密码" >
                </div>
                <div class="form-group input-group-sm">
                    <input type="test" name=""  width="30%"  class="form-control" >
                   <input type="button" value="获取验证码" class="btn btn-info" id="code">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>


                <p class="text-muted text-center"><a href="#"><small>忘记密码了？|自己想办法</small></a> 
                </p>
                <p style="color:red" align="center">{{session('msg')}}</p>

            </form>
        </div>
    </div>

    <!-- 全局js -->
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

    
    

</body>

</html>
<script type="text/javascript">
   $(document).on("click","#code",function(){
    var user_pwd = $("[name='user_pwd']").val();
     var user_name = $("[name='user_name']").val();

    $.ajax({
            url:"{{url('admin/code')}}",//请求的地址
            type:"GET",//请求的类型get post
            data:{user_name:user_name,user_pwd:user_pwd},//传输的数据
            dataType:"json",//返回的数据类型
            success:function(res){  //成功的执行方法
                console.log(res);
            }

        })
   })
</script>
