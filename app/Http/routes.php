<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/admin/index', function () {
//     return view('welcome');
// });

// Route::group(['middleware'=>'adminlogin'],function(){
// 	//后台首页
// 	Route::controller('/admins','AdminController');
// 	//用户模块
// 	Route::controller('/admin/user','UserController');
// 	//分类模块
// 	Route::controller('/admin/gory','GoryController');
// 	//商品模块
// 	Route::controller('/admin/goods','GoodsController');
// 	//友情链接模块
// 	Route::controller('/admin/link','LinkController');
// 	//订单模块
// 	Route::controller('/admin/order','OrderController');
// 	//文章模块
// 	Route::controller('/admin/article','ArticleController');
// 	//评论模块
// 	Route::controller('/admin/comment','CommentController');
// 	//广告模块
// 	Route::controller('/admin/ads','AdsController');
// });

// //后台登录
// Route::get('/admin/login','AdminController@login');
// //执行后台登录
// Route::post('/admin/dologin','AdminController@dologin');
// //后台登出
// Route::get('/admin/logout','AdminController@logout');
// //测试压缩图片
// Route::get('/img','ArticleController@img');
// // //ajax
// // Route::post('/doajax','UserController@doajax');
// //测试前台
// // Route::controller('/home','TestController');


// //---------------------------------------前台
// //前台注册
// Route::get('/home/register','RegisterController@register');
// //执行注册
// Route::post('/home/doregister','RegisterController@doregister');
// //加载验证码
// Route::get('/home/vcode','RegisterController@vcode');


// //邮件测试
// Route::get('/send','RegisterController@send');
// //邮件发送模板
// Route::get('/sendMail','RegisterController@sendMail');
// //邮件激活
// Route::get('/sens','RegisterController@sens');

// //前台登录
// Route::get('/home/login','HomeController@login');
// //执行登录
// Route::post('/home/dologin','HomeController@dologin');
// //前台登出
// Route::get('/home/logout','HomeController@logout');
// //忘记密码
// Route::get('/home/forget','HomeController@forget');
// //执行忘记密码
// Route::post('/home/doforget','HomeController@doforget');
// //密码找回
// Route::get('/home/resetpass','HomeController@resetpass');
// //执行密码找回
// Route::post('/home/doresetpass','HomeController@doresetpass');

// Route::group(['middleware'=>'cartlogin'],function($id){
// 	//订单页
// 	Route::controller('/home/order','OrderhomeController');
// 	//评论
// 	Route::controller('/home/comment','CommenthomeController');
// 	//追加评论
// 	Route::controller('/home/addcomment','AddcommentController');
	
// });

// Route::group(['middleware'=>'homelogin'],function(){
// 	//个人中心页
// 	Route::controller('/home/user','UserhomeController');
// });

// //购物车登录
// Route::get('/cart/login','OrderhomeController@login');
// //执行前台登录
// Route::post('/cart/dologin','OrderhomeController@dologin');

// //前台首页(包含很多页面)
// Route::controller('/home','HomeController');
// //购物车
// Route::controller('/homes/cart','CartController');

Route::controller('/home','HomeController');
Route::controller('/home/index','HomeController@index');

