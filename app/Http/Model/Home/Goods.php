<?php  
namespace App\Http\Model\Home;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\SoftDeletes;  
use DB;  
class Goods extends Model {  
    //use SoftDeletes;  
    static function get_goods_info($id){
    	$goods_info = DB::table('goods')->where('goods_id',$id)->first();
    	return obj_to_array($goods_info);
    }
}

?>