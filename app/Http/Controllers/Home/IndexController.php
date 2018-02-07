<?php 
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\PublicController;
use Illuminate\Http\Request;
use App\Http\Requests\HomeRegisterController;
use DB;
use Mail;
use Hash;

Class IndexController extends PublicController{
	public function index(){
		return view('Home.Index.index');
	}
}
?>