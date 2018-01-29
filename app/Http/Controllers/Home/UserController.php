<?php 
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\PublicController;
use Illuminate\Http\Request;
use App\Http\Requests;

Class UserController extends PublicController{
	public function register(Request $request){
		if($request->isMethod('post')){

		}else{
			return view('Home.User.register');
		}
	}

	public function check_test(Request $request){
		print_r($request->all());
	}
}
 ?>