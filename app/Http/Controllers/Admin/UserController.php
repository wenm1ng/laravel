<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\PublicController;
use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;
use Config;

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
		$admin_list = DB::table('admin')->orderBy('create_time','DESC')->paginate(10);

		foreach ($admin_list as $key => $val) {
			if($val->status){
				$admin_list[$key]->status = '启用';
			}else{
				$admin_list[$key]->status = '禁用';
			}

			if($val->is_super){
				$admin_list[$key]->is_super = '超级管理员';
			}else{
				$admin_list[$key]->is_super = '普通管理员';
			}
		}

		return view('Admin.User.index',['list'=>$admin_list]);
	}


	public function addinfo(Request $request){
		if($request->isMethod('post')){
			//自动验证操作
			// print_r($request->all());exit; 
	    	// $this->validate($request,[
	    	// 	'username'=>'required|regex:/\w{4,8}/',//用户名规则
	     //        'username' => 'unique:admin,admin_name',//判断在数据库中是否唯一
	    	// 	'password'=>'required|regex:/\w{6,15}/',//密码规则
	    	// 	'email'=>'required|email',//邮箱规则
	     //        'email' => 'unique:admin,email',//判断在数据库中是否唯一
	     //        'is_super'=>'required'
	    	// 	],[
	    	// 	'username.required'=>'用户名不能为空',
	    	// 	'username.regex'=>'用户名必须是4-8任意的数字字母下划线',
	     //        'username.unique'=>'该用户名已存在',
	    	// 	'password.required'=>'密码不能为空',
	    	// 	'password.regex'=>'密码必须是6-15位',
	    	// 	'email.required'=>'邮箱名不能为空',
	    	// 	'email.email'=>'邮箱名不符合要求',
	     //        'email.unique'=>'该邮箱已被注册',
	     //        'is_super.required'=>'等级不能为空'
	    	// 	]);

	    	if(empty($request->username)){
	    		return response()->json(['status'=>0,'msg'=>'登录名不能为空']);
	    	}

	    	if(empty($request->email)){
	    		return response()->json(['status'=>0,'msg'=>'邮箱名不能为空']);
	    	}

	    	if(empty($request->password)){
	    		return response()->json(['status'=>0,'msg'=>'密码不能为空']);
	    	}

	    	if($request->is_super == -1){
	    		return response()->json(['status'=>0,'msg'=>'请选择账号权限']);
	    	}

	    	if(DB::table('admin')->where("login_name",'=',$request->username)->first()){
	    		return response()->json(['status'=>0,'msg'=>'该账号名已存在']);
	    	}

	    	if(DB::table('admin')->where("email",'=',$request->email)->first()){
	    		return response()->json(['status'=>0,'msg'=>'该邮箱已存在']);
	    	}

	    	$data['login_name'] 	= $request->username;
	    	$data['password'] 		= Hash::make($request->password);
	    	$data['is_super'] 		= $request->is_super;
	    	$data['email'] 			= $request->email;
	    	$data['status'] 		= 1;
	    	$data['create_time'] 	= date('Y-m-d H:i:s');
	    	$data['update_time'] 	= date('Y-m-d H:i:s');

	    	$last_id = DB::table('admin')->insertGetId($data);

	    	if($last_id){
	    		return response()->json(['status'=>1,'msg'=>'添加成功','url'=>'/admin/user/index']);
	    	}else{
	    		log_error('fail_sql',json_encode(DB::getQueryLog()),Config::get('constants.LOG_PATH'));
	    		return response()->json(['status'=>0,'msg'=>'添加失败']);
	    	}
		}else{
			
			return view('Admin.User.addinfo');
		}
	}

}

 ?>