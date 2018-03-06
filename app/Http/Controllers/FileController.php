<?php 
	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Config;

	Class FileController extends Controller{
		public function upload_img(Request $request){
			if($request->hasFile('download')){
				$file = $request->file('download');
				// print_r($file);exit;
				//获取文件后缀
				$suffix = $file->getClientOriginalExtension();

				$name = substr(md5(time().mt_rand(1111,999999)),5,10);

				$full_name = $name.'.'.$suffix;

				if($file->move('.'.Config::get('constants.TEMP_DIR'),$full_name)){
					// print_r(Config::get('constants.TEMP_DIR').'/'.$full_name);
					return response()->json(['status'=>1,'msg'=>'上传成功','download'=>array('savepath'=>Config::get('constants.TEMP_DIR').'/'.$full_name,'ext'=>$suffix,'name'=>$full_name)]);
				}else{
					return response()->json(['status'=>0,'msg'=>'上传失败','data'=>'']);
				}
			}
		}
	} 
 ?>