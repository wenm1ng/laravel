<?php 
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Home\PublicController;
Class PageController extends PublicController{
	public function index(Request $request){
		return view('Home.Page.register');
	}
}
 ?>