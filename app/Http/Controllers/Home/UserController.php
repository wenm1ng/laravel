<?php 
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\PublicController;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

Class UserController extends PublicController{
	public function register(Request $request){
		if($request->isMethod('post')){

		}else{
			return view('Home.User.register');
		}
	}

	public function check_test(Request $request){
		//验证表单在数据库是否存在
		switch ($request->type) {
			case '1':
				//验证邮箱
				$user_info = DB::table('user')->where('email','=',$request->email)->first();
				if(empty($user_info)){
					return array('status'=>1,'msg'=>'该邮箱可用！');
				}else{
					return array('status'=>0,'msg'=>'该邮箱已被使用！');
				}
				// print_r(DB::getQueryLog());
				break;
			
			default:
				# code...
				break;
		}
	}
}
 ?>