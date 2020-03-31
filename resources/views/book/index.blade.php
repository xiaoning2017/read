<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>首页展示</title>
<style type="text/css">
	.clear{
		clear:both;
	}
 
	#top_left{
		width:300px;
		float: left;
	}
	#top_right{
		width:400px;
		float: right;
		margin-top:15px;
		font-size: 13px;
	}
	#top_right img{
		margin-bottom: -5px;
	}
	#top_right a{
		text-decoration: none;
		color:#06F;
	}
	#top_right a:hover{
		color:#909;
	}
	#menu{
		background-color: #1C3F09;
		border-top:5px solid #82B211;
		padding: 10px 0px;
		text-align: center;
	}
	#menu a{
		margin: 0 8px;
		color: #fff;
		text-decoration: none;
		font-weight: bold;
		font-size: 15px;
	}
	#menu a:hover{
		color: #999;
	}
	#menu .all{
		color: yellow
	}
	#search{
		
		background-color: #B6B684;
		padding:7px 0;
		text-align: right;
		
	}
	#search input[type='submit']{
		/* margin-top: 5px; */
		margin-right: 250px;
		margin-bottom: -4px;
	}
	#search input[type='text']{
		height: 16px;
		border:1px solid #999;
	}
	
	/*-------------------------------------------------------*/
	
	#content{
		width:900px;
		margin:8px auto 15px;/*auto div居中*/
	}
	
	#content_top{
		text-align: right;
		font-size:13px;
	}
	#content_bottom{
		border:1px solid #999;
		background-color: #FCFDEF;
		padding:10px 15px;
	}
	#content_bottom h1{
		font-size: 15px;
		display: inline;
	}
	#content_bottom span{
		font-size: 13px;
	}
	#productlist_img img{
		width: 100%;
	}
	.book{
		float: left;
		width: 25%;
		text-align: center;
		padding:10px 0px;
	}
	.bookimg img{
		width: 130px;
		height: 196px;
	}
	#jumpPage{
		text-align: center;
		margin: 10px;
	}
	#jumpPage a{
		padding:2px 6px;
		border: 1px solid #9AAFE5;
		text-decoration: none;
		color:#9AAFE5;
	}
	#jumpPage a:hover{
		color:#2B66A5;
		border: 1px solid #2B66A5;
	}
	.current{
		background-color: blue;
	}
    
    /*-------------------------------------------------------*/
    
    #bottom{
        background-color: #EFEEDC;
        height:60px;
        padding:10px 0px;
    }
	
	#bottom_left{
		width: 400px;
		float: left;
		margin-left: 200px;
	}
	#bottom_right{
		width: 500px;
		float: left;
		line-height:28px;/*行高*/
	}
 
</style>
</head>
<body>
	<div id="page">
		<div id="top">
			<div id="top_left">
				<img alt="" src="/picture/logo1.jpg">
			</div>
			<div id="top_right">
				<img alt="" src="/picture/cart.gif">
				<a href="#">购物车</a>|
				<a href="#">首页</a>|
				<a href="/index/quit">退出</a>|
				<a href="/index/register">新用户注册</a>
			</div>
		</div>
		<div class="clear"></div>
		<div id="menu">
			<a href="#">文学</a>
			<a href="#">生活</a>
			<a href="#" >计算机</a>
			<a href="#" style="color:red">作者申请</a>
			<a href="#" style="color:red">作者发布新书</a>
			<a href="#" style="color:red">励志</a>
			<a href="#" style="color:red">社会</a>
			<a href="#" style="color:red">学术</a>
			<a href="#" style="color:red">少儿</a>
			<a href="#" style="color:red">艺术</a>
			<a href="#" style="color:red">科技</a>
			<a href="#" style="color:red">考试</a>
			<a href="#" style="color:red">生活百科</a>
			<a class="all" href="#">全部目录商品</a>
		</div>
		<form action="{{url('cate/store')}}" method="post"  enctype="multipart/form-data">
		<div id="search">
			<span>Search</span>
			<select name="" id="">
                <option value="">--请选择</option>
            @foreach($cateData as $v)	
				<option value="{{$v->id}}">{{$v->cate_name}}</option>
            @endforeach
			</select>
			<!-- <input type="text" name="book_name"  value="{{ $query['book_name']??'' }}" placeholder="只能书名"/> -->
            <input type="submit"value="查询">
            <!-- <button>提交</button> -->
		</div>
		</form>
		<div id="content">
			<div id="content_top">
				<span>欢迎大神 ：{{ Session::get('user') }} </span>
			</div>
			
			<div id="content_bottom">
				<h1>书目录</h1>
				<hr/>
				<h1>书分类</h1>
				<span>共n种商品</span>
				<hr/>
				<div id="productlist">
					<div id="productlist_img">
						<img alt="" src="/picture/productlist.gif" width="100%">
					</div>
					<div id="booklist">
                        <table border="1">
                        <tr align="center">
                            <td>书名</td>
                            <td>售价</td>
                            <td>详情</td>
                            <td>分类名称</td>
                        </tr>
                    @foreach($bookData as $v)
                    <tr align="center">
                        <td>{{$v->book_name}}</td>
                        <td>{{$v->book_price}}</td>                       
                        <td>{{$v->book_detail}}</td>                       
                        <td>{{$v->cate_name}}</td>                       
                        <!-- <td><img src="{{ URL::asset('/picture/101.jpg') }}" width="50" height="50"></td>  -->
                        <!-- <td><img src="{{ URL::asset('picture/'.$v->book_img) }}" width="50" height="50"></td>   -->    
                    </tr>
                    @endforeach
                        </table>
						<!-- <div class="book">
							<div class="bookimg">
								<img alt="" src="/picture/101.jpg">
							</div>
							<div class="bookIntr">
								<span>书名：{{$v->book_name}}</span><br/>
								<span>售价：{{$v->book_price}}</span>
                            </div>
                            
						</div>
						<div class="book">
							<div class="bookimg">
								<img alt="" src="/picture/102.jpg">
							</div>
							<div class="bookIntr">
								<span>书名：{{$v->book_name}}</span><br/>
								<span>售价：{{$v->book_price}}</span>
							</div>
						</div> -->
						<!-- <div class="book">
							<div class="bookimg">
								<img alt="" src="/picture/103.jpg">
							</div>
							<div class="bookIntr">
								<span>书名：xxx</span><br/>
								<span>售价：xxx</span>
							</div>
						</div>
						<div class="book">
							<div class="bookimg">
								<img alt="" src="/picture/104.jpg">
							</div>
							<div class="bookIntr">
								<span>书名：xxx</span><br/>
								<span>售价：xxx</span>
							</div>
						</div>
						<div class="book">
							<div class="bookimg">
								<img alt="" src="/picture/105.jpg" width="102">
							</div>
							<div class="bookIntr">
								<span>书名：xxx</span><br/>
								<span>售价：xxx</span>
							</div>
						</div>
						<div class="book">
							<div class="bookimg">
								<img alt="" src="/picture/106.jpg" width="102">
							</div>
							<div class="bookIntr">
								<span>书名：xxx</span><br/>
								<span>售价：xxx</span>
							</div>
						</div>
						<div class="book">
							<div class="bookimg">
								<img alt="" src="/picture/107.jpg">
							</div>
							<div class="bookIntr">
								<span>书名：xxx</span><br/>
								<span>售价：xxx</span>
							</div>
						</div> -->
						<!-- <div class="book">
							<div>
								<img alt="" src="/picture/108.jpg" width="130">
							</div>
							<div>
								<span>书名:xxx</span>
								<br>
								<span>售价:xxx</span>
							</div>
						</div> -->
						<div class="clear"></div>
						
                        
                    </div>
                        <div id="jumpPage">
							<a href="#">上一页</a>
							<a class="current" href="#">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#">4</a>
							<a href="#">5</a>
							<a href="#">6</a>
							<a href="#">7</a>
							<a href="#">下一页</a>
                        </div>
				</div>
			</div>
		</div>
		<div id="bottom">
			<div id="bottom_left">
				<img alt="" src="/picture/logo1.jpg">
			</div>
			<div id="bottom_right">
				<span>CONTACT US</span><br/>
				<span>copyright 2017 &copy; striner All Rights RESERVED</span>
			</div>
		</div>
	</div>
</body>
</html>
