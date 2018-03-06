<?php 
	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Admin\PublicController;
	use App\Http\Controllers\Admin\ClassifyController;
	use Illuminate\Http\Request;
	use Illuminate\Support\Collection;
	use DB;
	use Mail;
	use Hash;
	use Config;

	Class GoodsController extends PublicController{
		public function index(){
		 	$list = DB::table('goods as g')->paginate(10);

		 	foreach ($list as $key => $val) {
		 		$class_list = DB::table("goods_classify")
		 		->where("class_id",'=',$val->class_id1)
		 		->orWhere('class_id','=',$val->class_id2)
		 		->orWhere('class_id','=',$val->class_id3)
		 		->get();

		 		$class_name = '';
		 		foreach ($class_list as $k => $v) {
		 			$class_name .= $v->class_name.'-';
		 		}

		 		$list[$key]->class_name = trim($class_name,'-');

		 		if($val->status == 1){
		 			$list[$key]->status = '在售';
 		 		}else{
		 			$list[$key]->status = '下架';
 		 		}
		 	}

		 	// print_r($list);
			return view('Admin.Goods.index',['list'=>$list]);
		}

		public function addinfo(Request $request){
			if($request->isMethod('post')){
				$data = $request->only('goods_name','goods_num','goods_cost_price','goods_price');
				if($request->class_id1 == -1 || $request->class_id2 == -1 || $request->class_id3 == -1){
					return response()->josn(['status'=>0,'msg'=>'请选择商品分类']);
				}

				if(isset($request->class_id1)){
					$data['class_id1'] = $request->class_id1;
				}
				if(isset($request->class_id2)){
					$data['class_id2'] = $request->class_id2;
				}
				if(isset($request->class_id3)){
					$data['class_id3'] = $request->class_id3;
				}

				//进行临时文件移动
				if(isset($request->goods_img1)){
					$right = false;
					Directory('.'.Config::get('constants.GOODS'));
					$goods_img1 = trim(strrchr($request->goods_img1,'/'),'/');
					if(rename('.'.$request->goods_img1, '.'.Config::get('constants.GOODS').'/'.$goods_img1)){
						$right = true;
						$data['goods_img1'] = Config::get('constants.GOODS').'/'.$goods_img1;
					}
				}
				if(isset($request->goods_img2)){
					$right = false;
					$goods_img2 = trim(strrchr($request->goods_img2,'/'),'/');
					if(rename('.'.$request->goods_img2, '.'.Config::get('constants.GOODS').'/'.$goods_img2)){
						$right = true;
						$data['goods_img2'] = Config::get('constants.GOODS').'/'.$goods_img2;
					}
				}
				if(isset($request->goods_img3)){
					$right = false;
					$goods_img3 = trim(strrchr($request->goods_img3,'/'),'/');
					if(rename('.'.$request->goods_img3, '.'.Config::get('constants.GOODS').'/'.$goods_img3)){
						$right = true;
						$data['goods_img3'] = Config::get('constants.GOODS').'/'.$goods_img3;
					}
				}
				if(isset($request->goods_img4)){
					$right = false;
					$goods_img4 = trim(strrchr($request->goods_img4,'/'),'/');
					if(rename('.'.$request->goods_img4, '.'.Config::get('constants.GOODS').'/'.$goods_img4)){
						$right = true;
						$data['goods_img4'] = Config::get('constants.GOODS').'/'.$goods_img4;
					}
				}

				if($right == false){
					return response()->json(['status'=>0,'msg'=>'图片上传失败']);
				}

				$data['create_time'] = date('Y-m-d H:i:s');
				$data['update_time'] = date('Y-m-d H:i:s');

				$last_id = DB::table('goods')->insertGetId($data);

				$collection = collect($last_id);
				if($collection->isEmpty()){
					return response()->json(['status'=>0,'msg'=>'添加失败']);
				}else{
					return response()->json(['status'=>1,'msg'=>'添加成功','url'=>'/admin/goods/index']);
				}
			}else{
				$classify = DB::table('goods_classify')->where('status','=','1')->where('pid','=','0')->get();

				return view('Admin.Goods.addinfo',['classify'=>$classify]);
			}
		}

		public function get_classify(Request $request){
			//分类级联
			$list = DB::table('goods_classify')->where("pid",'=',$request->class_id)->get();
			$collection = collect($list);
			// print_r(DB::getQueryLog());
			// print_r($list);
			if(!$list->first()){
				return response()->json(['status'=>0,'data'=>'']);
			}else{
				return response()->json(['status'=>1,'data'=>$list]);
			}
		}
	}
 ?>