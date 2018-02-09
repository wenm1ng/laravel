<?php 
	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Admin\PublicController;
	use Illuminate\Http\Request;
	use DB;
	use Mail;
	use Hash;

	Class IndexController extends PublicController{
		Public function index(){
			return view('Admin.Index.index');
		}
	}
 ?>