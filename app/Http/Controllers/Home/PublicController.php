<?php 
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use DB;

Class PublicController extends Controller{
	function __construct(){
		DB::connection()->enableQueryLog();
	}
}
 ?>