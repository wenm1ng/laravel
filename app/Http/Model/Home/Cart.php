<?php  
namespace App\Http\Model\Home;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\SoftDeletes;  
use DB;  
class Cart extends Model {  
    //use SoftDeletes;  
    static function getOne($id) {  
        $row = DB::table('news')->where('id', $id)->first();  
        //$row = DB::select("SELECT * FROM news WHERE id='$id'");  
        return $row;  
    }  

    static function check_login(){
    	if(session('user_info')){
    		return 1;
    	}else{
    		return 0;
    	}
    }
}

?>