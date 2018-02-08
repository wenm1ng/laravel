<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\PublicController;
use Illuminate\Http\Request;
use App\Http\Requests\HomeRegisterController;
use DB;
use Mail;
use Hash;

Class UserController extends PublicController{
	Public function login(Request $request){
		if($request->isMethod('post')){

		}else{
			return view('Admin.User.login');
		}
	}
}

 ?>