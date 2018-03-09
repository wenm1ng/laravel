<?php 
	namespace App\Http\Controllers\Home;

	use App\Http\Controllers\Home\PublicController;
	use Illuminate\Http\Request;
	use App\Http\Requests\HomeRegisterController;
	use DB;
	use Mail;
	use Hash;
	use App\Common;
	use RedisDB;
	use Illuminate\Support\Collection;
	use Cookie;

	Class CartController extends PublicController{
		public function index(Request $request){
			//判断用户有没有登录
			$cart_list = array();

			if($request->session()->has('user_info')){
				//登录获取redis的购物车信息
			}else{
				//获取cookie购物车信息
				foreach ($_COOKIE as $key => $value) {
					if(strrpos($key,'cart_info_') !== FALSE){
						//购物车存在该商品
						$cart_list[] = unserialize($value);
					}
				}
			}

			// print_r($cart_list);exit;
			return view('Home.Cart.index',['cart_list'=>$cart_list]);
		}
	}
 ?>