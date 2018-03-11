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
	use Illuminate\Http\Response;
	use Route;

	Class GoodsController extends PublicController{
		//商品详情
		public function viewinfo($id){
			// print_r($id);
			$goods_info = DB::table('goods')->where("goods_id",'=',$id)->first();
			return view('Home.Goods.viewinfo',['goods_info'=>$goods_info]);
		}

		//商品列表
		public function index($id){
			$goods_list = DB::table("goods")
			->where("class_id1",'=',$id)
			->orWhere("class_id2",'=',$id)
			->orWhere("class_id3",'=',$id)
			->paginate(16)->all();


			return view('Home.Goods.index',['goods_list'=>$goods_list]);
		}

		//购买商品
		public function purchase(Request $request,$id){
			$goods_info = DB::table("goods")->where("goods_id",'=',$id)->first();
			$goods_info = obj_to_array($goods_info);
			$goods_info['count'] = 1;
			// print_r($goods_info);exit;
			// Cookie::queue(cookie('cart_info_'.$id,serialize($goods_info)));
			// Cookie::forever('cart_info_'.$id,serialize($goods_info));
			//判断是否登录，登录将商品信息存入redis，没有登录存入cookie
			if($request->session()->has('user_info')){
				$cart_info = unserialize(RedisDB::get('cart_'.session('user_info')->user_id))?:array();

				if(isset($cart_info[$id])){
					$cart_info[$id]['count']++;
				}else{
					$cart_info[$id] = $goods_info;
					$cart_info[$id]['count'] = 1;
				}

				RedisDB::set('cart_'.session('user_info')->user_id,serialize($cart_info));
			}else{
				if(isset($_COOKIE['cart_info_'.$id])){
					// print_r($_COOKIE['cart_info_'.$id]);exit;
					$cookie = unserialize($_COOKIE['cart_info_'.$id]);
					$cookie['count']++;
					// print_r($cookie);exit;
					setcookie('cart_info_'.$id,serialize($cookie),time()+9999999,'/',$_SERVER['HTTP_HOST']);
				}else{
					setcookie('cart_info_'.$id,serialize($goods_info),time()+9999999,'/',$_SERVER['HTTP_HOST']);
				}
			}


			// print_r($goods_info);exit;
			// Route::get('cookieset',function(){
			// 	$cookie_cart = Cookie::forever('cart','nihao');
			// 	return Response::make()->withCookie($cookie_cart);
			// })
			// Cookie::queue(Cookie::forget('cart'));
			// Cookie::forget('cart');
			//获取原来的购物车cookie
			// if(isset($_COOKIE['cartt'])){
			// 	$cookie_cart = $_COOKIE['cartt'];
			// }else{
			// 	$cookie_cart = array();
			// }

			// print_r($cookie_cart);exit;
			
			//将商品信息存入cookie
			// print_r($cart_arr);echo '******************';exit;
			// Cookie::queue(Cookie::forget('cart'));
				// $cookie_cart = serialize($cart_arr);
				// setcookie('cartt',$cookie_cart,time()+999999999,'/',$_SERVER['HTTP_HOST']);
			// Cookie::queue(cookie('cart',$cart_arr));
			// setcookie('cart1',serialize($cart_arr));

			// $response = new Response();
			// $cookie = cookie('cart',$cart_arr);
			// $response->withCookie($cookie);

			// print_r($_COOKIE);exit;
			return redirect('/home/cart/index');
		}

	}
 ?>