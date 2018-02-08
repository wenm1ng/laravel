<?php 
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\PublicController;
use Illuminate\Http\Request;
use App\Http\Requests\HomeRegisterController;
use DB;
use Mail;
use Hash;

Class UserController extends PublicController{
	public function register(Request $request){
		if($request->isMethod('post')){
			// print_r($request->all());
			$data['login_name'] 	= $request->username;
			$data['email'] 			= $request->email;
			$data['password'] 		= Hash::make($request->password);
			$data['create_time'] 	= date('Y-m-d H:i:s');
			$data['update_time']	= date('Y-m-d H:i:s');
			$data['user_name']		= rand_name();

			$id = Db::table('user')->insertGetId($data);

			if($id){
				return array('status'=>1,'msg'=>'恭喜你注册成功！');
			}else{
				return array('status'=>0,'msg'=>'注册失败');
			}
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
			case '2':
				//验证登录名
				$user_info = DB::table('user')->where('login_name','=',$request->username)->first();
				if(empty($user_info)){
					return array('status'=>1,'msg'=>'该用户名可用！');
				}else{
					return array('status'=>0,'msg'=>'该用户名已被使用！');
				}
				break;
			// case '3':
			// 	//用户登录，验证账号密码
			// 	$user_info = DB::table('user')->where('login_name','=',$request->username)->first();
			// 	if($user_info){
			// 		if(Hash::check($request->password,$user_info->password)){
			// 			return array('status'=>1);
			// 		}else{
			// 			return array('status'=>0);
			// 		}
			// 	}else{
			// 		return array('status'=>0);
			// 	}
			// 	break;
			default:
				# code...
				break;
		}
	}

	public function send_email(Request $request){
		//发送短信
		$email = $request->email;
		//生成一个4位数验证码
		$code = '';
		for ($i=0; $i < 4; $i++) { 
			$code .= mt_rand(0,9);
		}

		session(['register_code'=>$code]);
		session(['register_time'=>time()]);

		//在闭包函数内部不能够直接使用闭包函数之外的变量,如果使用的话,用use
		Mail::send('Home.Mail.sens',['email'=>$email,'code'=>$code],function($message)use($email){
			$message->subject('验证码 文明商城');
			$message->to($email);
		});
	}

	//登录
	public function login(Request $request){
		if($request->isMethod('post')){
			//用户登录，验证账号密码
			$user_info = DB::table('user')->where('login_name','=',$request->username)->first();
			if($user_info){
				if(Hash::check($request->password,$user_info->password)){
					//写入用户信息到session
					session(['user_info'=>$user_info]);
					return array('status'=>1);
				}else{
					return array('status'=>0);
				}
			}else{
				return array('status'=>0);
			}
		}else{
			return view('Home.User.login');
		}
	}

	public function logout(Request $request){
		$request->session()->forget('user_info');

		return back();
	}
}
 ?>