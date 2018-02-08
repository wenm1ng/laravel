<?php 
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\PublicController;
use Illuminate\Http\Request;
use App\Http\Requests\HomeRegisterController;
use DB;
use Mail;
use Hash;
use App\Common;

Class IndexController extends PublicController{
	public function index(Request $request){
		// print_r($request->session()->get('user_info')->login_name);
		return view('Home.Index.index');
	}
}
?>