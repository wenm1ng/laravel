<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta charset="utf-8" name="csrf_token" content="{{ csrf_token() }}">
<title>登陆</title>
<link href="/css/base.css" rel="stylesheet" type="text/css">
<link href="/css/css.css" rel="stylesheet" type="text/css">
<script src="/js/jquery-2.1.1.min.js"></script>
<style>
.tab {
	overflow: hidden;
	margin-top: 20px; margin-bottom:-1px;
}
.tab li {
	display: block;
	float: left;
	width: 100px;padding:10px 20px; cursor:pointer; border:1px solid #ccc; 
}
.tab li.on {
	background: #90B831; color:#FFF;padding:10px 20px;
}
.conlist {padding:30px; border:1px solid #ccc; width:300px;}
.conbox {
	display: none;
}
</style>
<script>
$(function(){
	$(".tab li").each(function(i){
		$(this).click(function(){
		$(this).addClass("on").siblings().removeClass("on");
		$(".conlist .conbox").eq(i).show().siblings().hide();
		})
	})
})
</script>
</head>

<body>
<div class="login-top">
    <div class="wrapper">
        <div class="fl font30">LOGO</div>
        <div class="fr">您好，欢迎为生活充电在线！</div>
    </div>
</div>
<div class="l_main">
    <div class="l_bttitle2"> 
        <!-- <h2>登录</h2>-->
        <h2><a href="/index">< 返回首页</a></h2>
    </div>
    <div class="loginbox fl">
        <div class="tab">
            <ul>
                <li class="on">欢迎登陆</li>
                <!-- <li>我是卖家</li> -->
            </ul>
        </div>
        <div class="conlist">
            <div class="conbox" style="display:block;">
            		<!-- {{ csrf_field() }} -->
        		<p>
                  	<div class="veri" style="height:1px"></div>
                    <input type="text" name="username" class="loginusername">
                </p>
                <p>
                    <input type="password" name="password" class="loginuserpassword">
                </p>
                <p><span class="fl fntz14 margin-t10"><a href="/user/register" style="color:#ff6000">立即注册</a></span><span class="fr fntz12 margin-t10"><a href="/user/forget">忘记密码？</a></span></p>
                <p>
                    <input type="submit" class="loginbtn" value="登  录">
                </p>
            </div>
            <!-- <div class="conbox">
            	<p>
                    <input type="text" class="loginusername">
                </p>
                <p>
                    <input type="password" class="loginuserpassword">
                </p>
                <p><span class="fl fntz14 margin-t10"><a href="/user/register" style="color:#ff6000">立即注册</a></span><span class="fr fntz12 margin-t10"><a href="#">忘记密码？</a></span></p>
                <p>
                    <input type="button" class="loginbtn" value="登  录">
                </p>
            </div> -->
        </div>
    </div>
    
    <div class="fr margin-r100 margin-t45"><img src="images/login-pic.jpg" width="507" height="325"></div>
</div>
</body>
<script>
	$('.loginbtn').click(function(){
		username = $('input[name="username"]').val();
		password = $('input[name="password"]').val();
		that = $('.veri');

		$.ajax({
			'type':'post',
			'url':'/user/login',
			'data':{username:username,password:password},
			'headers':{'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')},
			'success':function(data){
				// console.log(data);
				if(data.status){
					//登录
                    location.href = '/index';
				}else{
					//提示信息
					that.html('');
					that.append('<span style="color:red">帐号或密码错误，请重新输入或者<a href="/user/forget" style="color:#90B831">找回密码</a></span>');
				}
			},
			'error':function(data){
				alert(2);
			}
		})
	})
</script>
</html>
