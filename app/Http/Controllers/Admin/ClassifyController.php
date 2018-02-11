<?php 
	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Admin\PublicController;
	use Illuminate\Http\Request;
	use DB;
	use Mail;
	use Hash;
	use Config;

	Class ClassifyController extends PublicController{
		public function index(){
			return view('Admin.Classify.index');
		}

		public function addinfo(Request $request){
			if($request->isMethod('post')){

			}
		}
	}

 ?>