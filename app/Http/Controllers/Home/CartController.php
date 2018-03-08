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
			print_r($request->cookie('cart'));
		}
	}
 ?>