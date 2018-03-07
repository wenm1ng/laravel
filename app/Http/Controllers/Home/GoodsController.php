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

	Class GoodsController extends PublicController{
		public function viewinfo(Request $request){
			return view('Home.Goods.viewinfo');
		}

		public function index(Request $request){
			return view('Home.Goods.index');
		}
	}
 ?>