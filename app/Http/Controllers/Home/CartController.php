<?php 
	namespace App\Http\Controllers\Home;

	use App\Http\Controllers\Home\PublicController;
	use Illuminate\Http\Request;
	use DB;
	use Mail;
	use Hash;
	use App\Common;
	use RedisDB;
	use Illuminate\Support\Collection;
	use Cookie;
	use App\Http\Model\Home\Cart; 
	use App\Http\Model\Home\Goods; 

	Class CartController extends PublicController{
		public function index(Request $request){
			//判断用户有没有登录
			$cart_list = array();
			// print_r($_COOKIE);
			if($request->session()->has('user_info')){
				$is_login = 1;
				//登录获取redis的购物车信息
				// print_r(session('user_info')->user_id);exit;
				$cart_list = unserialize(redisDB::get('cart_'.session('user_info')->user_id))?:array();
				// print_r($cart_list);exit;
			}else{
				$is_login = 0;
				//获取cookie购物车信息
				// echo rand_string(6);exit;
				foreach ($_COOKIE as $key => $value) {
					if(strrpos($key,'cart_info_') !== FALSE){
						//购物车存在该商品
						$cookie_info = unserialize($value);
						$cookie_info['cookie_key'] = base64_encode('super_fast'.$key).rand_string(6);
						$cart_list[] = $cookie_info;
					}
				}
			}

			// print_r($cart_list);exit;
			return view('Home.Cart.index',['cart_list'=>$cart_list,'is_login'=>$is_login]);
		}

		//判断用户在购物车结算的时候是否登录
		public function check_login(Request $request){
			$is_login = Cart::check_login();
			if($is_login){
				return Response()->json(['status'=>1]);
			}else{
				return Response()->json(['status'=>0]);
			}
		}

		//购物车结算时的登录
		public function login(Request $request){
			// print_r($request->all());exit;
			if($request->isMethod('post')){
				//用户登录，验证账号密码
				$user_info = DB::table('user')->where('login_name','=',$request->username)->first();
				if($user_info){
					if(Hash::check($request->password,$user_info->password)){
						//写入用户信息到session
						session(['user_info'=>$user_info]);

						//在redis中获取用户的购物车信息
						$cart_info = unserialize(RedisDB::get('cart_'.$user_info->user_id))?:array();

						foreach ($request->id_arr as $key => $val) {
							if(isset($cart_info[$val])){
								$cart_info[$val]['count']++;
							}else{
								$goods_info = Goods::get_goods_info($val);
								$cart_info[$val] = $goods_info;
							}
						}

						// print_r($cart_info);exit;
						//将cookie中的购物车信息存入redis
						RedisDB::set('cart_'.$user_info->user_id,serialize($cart_info));

						//删除本地购物车cookie
						foreach ($_COOKIE as $key => $val) {
							if((strrpos($key,'cart_info_') !== FALSE)){
								setcookie($key,'',time()-9999999,'/',$_SERVER['HTTP_HOST']);
							}
						}
						return array('status'=>1);
					}else{
						return array('status'=>0);
					}
				}else{
					return array('status'=>0);
				}
			}
		}
	}
 ?>