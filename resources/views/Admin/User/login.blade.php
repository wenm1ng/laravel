<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/Admin/b/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/b/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/b/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Admin/b/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Admin/b/css/mws-theme.css" media="screen">

<title>后台 - 登录</title>

</head>

<body>
     @if(session('error'))
           <div id="mws-container" class="clearfix">
            <div class="container" style="margin-left:575px">
              <div class="mws-form-message danger">
                     {{session('error')}}
               </div>
             </div>
          </div>
          @endif
    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>登录</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                
                <form class="mws-form" action="/admin/dologin" method="post">
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="username" class="mws-login-username required" placeholder="用户名" value="{{old('username')}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="password" class="mws-login-password required" placeholder="密码" value="{{old('password')}}">
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">记住我</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="Login" class="btn btn-success mws-login-button">
                        {{csrf_field()}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="/Admin/b/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/Admin/b/js/libs/jquery.placeholder.min.js"></script>
    <script src="/Admin/b/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/Admin/b/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/Admin/b/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/Admin/b/js/core/login.js"></script>

</body>
</html>
