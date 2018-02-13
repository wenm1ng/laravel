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
			
			// print_r($list);
			return view('Admin.Classify.index',['list'=>$this->get_classify()]);
		}

		public function get_classify(){
			$list = DB::table('goods_classify')->where('status','=','1')->where("pid",'=','0')->get();
			foreach ($list as $key => $val) {
				$son_list = DB::table('goods_classify')->where('pid','=',$val->class_id)->get();
				if(!empty($son_list)){
					foreach ($son_list as $k => $v) {
						$grandson_list = DB::table('goods_classify')->where('pid','=',$v->class_id)->get();
						if(!empty($grandson_list)){
							$son_list[$k]->grandson_list = $grandson_list;
						}
					}
					$list[$key]->son_list = $son_list;
				}
			}

			return $list;
		}

		public function addinfo(Request $request){
			if(empty($request->class_name)){
				return response()->json(['status'=>0,'msg'=>'分类名称不能为空']);
			}

			if($request->pid){
				//下属分类
				$data['pid'] = $request->pid;
			}
			//一级分类
				
			$data['class_name'] = $request->class_name;
			$data['create_time'] = date('Y-m-d H:i:s');
			$data['update_time'] = date('Y-m-d H:i:s');
			$last_id = DB::table('goods_classify')->insertGetId($data);

			if($last_id){
				return response()->json(['status'=>1,'msg'=>'添加成功']);
			}else{
				log_error('fail_sql',json_encode(DB::getQueryLog()),LOG_PATH);
				return response()->json(['status'=>0,'msg'=>'添加失败']);
			}
		}

		//分类级联
		public function cascade(Request $request){
			$son_list = DB::table('goods_classify')->where('pid','=',$request->class_id)->get();
			if(!empty($son_list)){
				foreach ($son_list as $k => $v) {
					$grandson_list = DB::table('goods_classify')->where('pid','=',$v->class_id)->first();
					if(!empty($grandson_list)){
						$son_list[$k]->has_son = 1;
					}
				}
			}

			return response()->json(['status'=>1,'data'=>$son_list]);
		}
	}

 ?>