<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::any('/home/index','HomeController@index');
// Route::any('/user/register','Home\UserController@register');
Route::group(['namespace'=>'Home'],function(){
	Route::any('/user/register','UserController@register');
	Route::post('/user/check_test','UserController@check_test');
	Route::post('/user/send_email','UserController@send_email');
	Route::any('/user/login','UserController@login');
	Route::get('/page/index',function(){
		return view('Home.Page.register');
	});
	Route::get('/page/not_found',function(){
		return view('Home.Page.not_found');
	});
	Route::get('/index','IndexController@index');
});
