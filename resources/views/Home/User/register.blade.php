<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="_token" content="{{ csrf_token() }}"/>
<title>注册</title>
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

<body class="l-bg">
<div class="login-top">
    <div class="wrapper">
        <div class="fl font30">LOGO</div>
        <div class="fr">您好，欢迎为生活充电在线！</div>
    </div>
</div>
<div class="l_main2" style="height:700px">
    <div class="l_bttitle"> 
        <h2>注册</h2>
    </div>
    <div class="loginbox">
        <div class="tab">
            <ul>
                <li class="on">我是买家</li>
                <li>我是卖家</li>
            </ul>
        </div>
        <div class="conlist">
            <div class="conbox" style="display:block;">
                <p>
                    <div class="fl res-text">用户名：</div><div><input type="text" name="username" placeholder="请输入用户名" class="loginuser username"></div>
                    <div class="veri"></div>
                </p>
                <p>
                    <div class="fl res-text">邮箱：</div><div><input type="text" name="eamil" placeholder="请输入邮箱" class="loginuser email"></div>
                    <div class="veri"></div>
                </p>
                <p>
                   <div class="fl res-text">密码：</div><div><input type="password" name="password" class="loginuser psw"></div>
                    <div class="veri"></div>
                </p>
                <p>
                   <div class="fl res-text">确认密码：</div><div><input type="password" name="repassword" class="loginuser repsw"></div>
                    <div class="veri"></div>
                </p>
                <p>
                   <div class="fl res-text">验证码：</div>
                   <div class="fl"><input type="text" name="code" class="loginuser2 code"></div>
                    <div class="veri"></div>
                   <div class="fl same-code">获取验证码</div>
                   <div class="fl same-code2">60秒后重新获取</div>
                </p>
                <p>
                    <input type="button" class="loginbtn" value="注 册">
                </p>
            </div>
            <div class="conbox">
            	  <p>
                    <div class="fl res-text">用户名：</div><div><input type="text" name="username" placeholder="请输入邮箱" class="loginuser username"></div>
                    <div class="veri"></div>
                </p>
                <p>
                    <div class="fl res-text">邮箱：</div><div><input type="text" name="eamil" placeholder="请输入邮箱" class="loginuser email"></div>
                    <div class="veri"></div>
                </p>
                <p>
                   <div class="fl res-text">密码：</div><div><input type="password" name="password" class="loginuser psw"></div>
                    <div class="veri"></div>
                </p>
                <p>
                   <div class="fl res-text">确认密码：</div><div><input type="password" name="repassword" class="loginuser repsw"></div>
                    <div class="veri"></div>
                </p>
                <p>
                   <div class="fl res-text">验证码：</div>
                   <div class="fl"><input type="text" name="code" class="loginuser2 code"></div>
                    <div class="veri"></div>
                   <div class="fl same-code">获取验证码</div>
                   <div class="fl same-code2">60秒后重新获取</div>
                </p>
                <p>
                    <input type="button" class="loginbtn" value="注 册">
                </p>
            </div>
        </div>
    </div>
</div>
</body>

<script>
  $('.username').on('focus',function(){
    $(this).parent().next().html('');
  }).blur(function(){
    var uPattern = /(?=.*[0-9].*)(?=.*[A-Z].*)(?=.*[a-z].*).{10,20}$/;
    if(uPattern.test($(this).val())){
      //验证用户名是否已存在
      that = $(this);
      $.ajax({
        type:'POST',
        url:'/user/check_test',
        data:{type:2},
        headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
        success:function(data){

        },
        error:function(data){

        }
      });
    }else{
      $(this).parent().next().append('<span style="color:red">用户名必须为10到20位大小写字母、数字组成</span>');
    }
  });


  $('.email').on('focus',function(){
    $(this).parent().next().html('');
  }).blur(function(){
    var uPattern = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
    var email = $(this).val();
    if(uPattern.test(email)){
      //验证邮箱是否存在
      that = $(this);
      $.ajax({
        type:'POST',
        url:'/user/check_test',
        data:{type:1,email:email},
        headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
        success:function(data){
          if(data.status){
            that.parent().next().append('<span style="color:green">'+data.msg+'</span>');
          }else{
            that.parent().next().append('<span style="color:red">'+data.msg+'</span>');
          }
        },
        error:function(data){
          that.parent().next().append('<span style="color:red">服务器繁忙，请稍后再试</span>');
        }
      })
    }else{
      $(this).parent().next().append('<span style="color:red">请输入正确的邮箱</span>');
    }
  });
</script>
</html>
