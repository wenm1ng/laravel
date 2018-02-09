<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\PublicController;
use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;

Class UserController extends PublicController{
	public function login(Request $request){
		if($request->isMethod('post')){
			// print_r($request->all());
			// print_r(Hash::make($request->password));
			$admin_info = DB::table('admin')->where("login_name",'=',$request->username)->first();

			if(empty($admin_info)){
				return back()->with('error','该管理账号不存在！');exit;
			}

			if($admin_info->status == 0){
				return back()->with('error','该管理账号被禁用！');exit;
			}

			if(Hash::check($request->password,$admin_info->password)){
				//记录登录信息
				session(['admin_info'=>$admin_info]);
				return redirect('/admin/index');
			}else{
				return back()->with('error','密码错误！');exit;
			}
		}else{
			return view('Admin.User.login');
		}
	}

	public function index(Request $request){
		return view('Admin.User.index');
	}


	public function addinfo(Request $request){
		if($request->isMethod('post')){

		}else{
			return view('Admin.User.addinfo');
		}
	}
}

 ?>