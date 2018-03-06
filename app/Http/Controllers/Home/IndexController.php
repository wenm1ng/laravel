<?php 
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\PublicController;
use Illuminate\Http\Request;
use App\Http\Requests\HomeRegisterController;
use DB;
use Mail;
use Hash;
use App\Common;
use Redis;

Class IndexController extends PublicController{
	public function index(Request $request){
		$redis = Redis::connection();
		// Redis::set('name','wenming');
		if(Redis::get('cache_home')){
			$serialize = Redis::get('cache_home');
		}else{
			//没有缓存数据，从数据库获取
			$class_list = DB::table('goods_classify')->where("status",'=','1')->where("pid",'=','0')->paginate(6);
			foreach ($class_list as $key => $val) {
				$class_list_mid = DB::table('goods_classify')->where("pid",'=',$val->class_id)->paginate(4);
				foreach ($class_list_mid as $k => $v) {
					$class_list_small = DB::table('goods_classify')->where("pid",'=',$v->class_id)->paginate(4);
					$class_list_mid[$k]->class_list_small = $class_list_small;
				}
				$class_list[$key]->class_list_mid = $class_list_mid;
			}

			$serialize = serialize($class_list);

			//缓存首页数据
			Redis::setex('cache_home',400,$serialize);

		}

		$unserialize = unserialize($serialize);
		// print_r($unserialize);exit;
		// print_r($request->session()->get('user_info')->login_name);、
		return view('Home.Index.index',['class_list'=>$unserialize]);
	}
}
?>