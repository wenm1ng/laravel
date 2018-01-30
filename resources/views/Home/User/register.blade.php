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
.veri{
  height:1px;
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
                <form action="/user/register" class="form-1">

                  <p>
                      <div class="fl res-text">用户名：</div><div><input type="text" name="username" placeholder="4-16位数字、字母、下划线" class="loginuser username"></div>
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
                     <div class="fl" style="margin-top:10px"><input type="text" name="code" class="loginuser2 code"></div>
                      <div class="veri" style="margin-top:8%"></div>
                     <div class="fl same-code">获取验证码</div>
                     <div class="fl same-code2" style="display:none"><span>60</span>秒后重新获取</div>
                  </p>
                  <p>
                      <!-- <a herf="#" class="loginbtn" value="注 册" target-form="form-1"> -->
                      <input type="button" class="loginbtn" value="注 册">
                  </p>
                </form>
            </div>
            
            
              <div class="conbox">
                <form action="/user/register" class="form-2">
                  <p>
                      <div class="fl res-text">用户名：</div><div><input type="text" name="username" placeholder="4-16位数字、字母、下划线" class="loginuser username"></div>
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
                     <div class="fl" style="margin-top:10px"><input type="text" name="code" class="loginuser2 code"></div>
                      <div class="veri" style="margin-top:8%"></div>
                     <div class="fl same-code">获取验证码</div>
                     <div class="fl same-code2" style="display:none"><span>60</span>秒后重新获取</div>
                  </p>
                  <p>
                      <input type="button" class="loginbtn" value="注 册">
                      <!-- <a herf="#" class="loginbtn" value="注 册" target-form="form-2"> -->
                  </p>
                </form>
              </div>
        </div>
    </div>
</div>
</body>

<script>
  first_input = false;
  second_input = false;
  third_input = false;
  fourth_input = false;
  fiveth_input = false;

  $('.username').on('focus',function(){
    $(this).parent().next().html('');
  }).blur(function(){
    var uPattern = /^[a-zA-Z0-9_-]{4,16}$/;
    var username = $(this).val();
    if(uPattern.test(username)){
      //验证用户名是否已存在
      that = $(this);
      $.ajax({
        type:'POST',
        url:'/user/check_test',
        data:{type:2,username:username},
        headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
        success:function(data){
          if(data.status){
            that.parent().next().append('<span style="color:green">'+data.msg+'</span>');
            first_input = true;
          }else{
            that.parent().next().append('<span style="color:red">'+data.msg+'</span>');
            first_input = false;
          }
        },
        error:function(data){
          that.parent().next().append('<span style="color:red">服务器繁忙，请稍后再试</span>');
        }
      });
    }else{
      $(this).parent().next().append('<span style="color:red">用户名不符合规则</span>');
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
            second_input = true;
          }else{
            that.parent().next().append('<span style="color:red">'+data.msg+'</span>');
            second_input = false;
          }
        },
        error:function(data){
          that.parent().next().append('<span style="color:red">服务器繁忙，请稍后再试</span>');
        }
      })
    }else{
      $(this).parent().next().append('<span style="color:red">邮箱不符合规则</span>');
    }
  });

  //密码验证
  $('.psw').on('focus',function(){
    $(this).parent().next().html('');
  }).blur(function(){
    var uPattern = /(?=.*[0-9].*)(?=.*[A-Z].*)(?=.*[a-z].*).{8,20}$/;
    var password = $(this).val();
    if(uPattern.test(password)){
      $(this).parent().next().append('<span style="color:green">密码输入正确</span>');
      third_input = true;
    }else{
      $(this).parent().next().append('<span style="color:red">密码必须由8到20位大小写字母、数字组成</span>');
      third_input = false;
    }
  });

  //重复密码验证
  $('.repsw').on('focus',function(){
    $(this).parent().next().html('');
  }).blur(function(){
    var uPattern = /(?=.*[0-9].*)(?=.*[A-Z].*)(?=.*[a-z].*).{8,20}$/;
    var repassword = $(this).val();

    password = $(this).parents('.conbox').find('.psw').val();

      if(uPattern.test(password)){
        if(password == repassword){
          $(this).parent().next().append('<span style="color:green">密码输入正确</span>');
          fourth_input = true;
        }else{
          $(this).parent().next().append('<span style="color:red">两次密码不一致</span>');
          fourth_input = false;
        }
      }else{
        $(this).parent().next().append('<span style="color:red">密码必须由8到20位大小写字母、数字组成</span>');
      }
  });

  //发送验证码
  $('.same-code').click(function(){
    if(second_input){
      $(this).next().toggle();
      //先进行倒计时动画效果
      var that = $(this);
      that.next().find('span').html(60);
      var email = that.parents('.conbox').find('.email').val();
      that.toggle();

      var time = $(this).next().find('span').html();
      inter = setInterval(function(){
        time--;
        that.next().find('span').html(time);

        if(time <= 0){
          clearInterval(inter);
          that.next().toggle();
          that.toggle();
        }
      }, 1000)

      //发送邮件
      $.ajax({
        type:'POST',
        url:'/user/send_email',
        data:{email,email},
        headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
        success:function(data){
          
        },
        error:function(data){
          alert(2);
        }
      })
    }
  });

  //验证码
  $('.code').on('focus',function(){
    $(this).parent().next().html('');
  }).blur(function(){
    if($(this).val() == ''){
      $(this).parent().next().append('<span style="color:red">验证码不能为空</span>');
      fiveth_input = false;
    }else{
      fiveth_input = true;
    }
  })

  $('.loginbtn').click(function(){
    if(first_input && second_input && third_input && fourth_input && fiveth_input){
      var form = $(this).attr('target-form');
      var data = $('.'+form).serialize();
      alert(data);
    }
  })
</script>
</html>
