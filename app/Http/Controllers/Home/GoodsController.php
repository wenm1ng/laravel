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
			// print_r($goods_info);exit;
			// Route::get('cookieset',function(){
			// 	$cookie_cart = Cookie::forever('cart','nihao');
			// 	return Response::make()->withCookie($cookie_cart);
			// })
			// Cookie::queue(Cookie::forget('cart'));
			// setcookie('cart','',-1,'/');
			// Cookie::forget('cart');
			//获取原来的购物车cookie

			$cookie_cart = $request->cookie('cart');
			// print_r($cookie_cart);exit;
			$cart_arr = array();
			if(empty($cookie_cart)){
				$cart_arr[] = $goods_info;
			}else{
				//将商品信息追加到cookie
				$cart_arr = $cookie_cart;
				$cart_arr[] = $goods_info;
			}
			//将商品信息存入cookie
			// print_r($cart_arr);exit;
			$response = new Response();
			$cookie = cookie('cart',$cart_arr);
			// $response->withCookie($cookie);

			print_r(Cookie::get('cart'));exit;
			return redirect('/home/cart/index');
		}

	}
 ?>