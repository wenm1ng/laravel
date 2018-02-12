<?php 
	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Admin\PublicController;
	use App\Http\Controllers\Admin\ClassifyController;
	use Illuminate\Http\Request;
	use DB;
	use Mail;
	use Hash;
	use Config;

	Class GoodsController extends PublicController{
		public function index(){
		 	$list = DB::table('goods')->paginate(10);
			return view('Admin.Goods.index',['list'=>$list]);
		}

		public function addinfo(Request $request){
			if($request->isMethod('post')){

			}else{
				$classify = DB::table('classify')->where('status','=','1')->where('pid','=','0')->->get();

				return view('Admin.Goods.addinfo',['classify'=>$classify]);
			}
		}
	}
 ?>