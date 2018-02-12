@extends('Admin.Public.public')
@section('body')
<div class="panel panel-default">
			
	<div class="panel-heading">
		<div class="panel-title">
			新增管理员
		</div>
		
		<small class="text-small pull-right" style="padding-top:5px;">
			<code>data-validate="rule1,rule2,...,ruleN"</code>
		</small>
	</div>
	
	<div class="panel-body">
	
		<form role="form" url="/admin/goods/addinfo" method="post" class="validate form-horizontal" novalidate="novalidate">
			<div class="form-group" >
				<label class="col-sm-2 control-label" for="field-1">商品名称</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="goods_name" id="field-1">
				</div>
			</div>

			<div class="form-group-separator"></div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="class_id1">商品类别</label>
				
				<div class="col-sm-10">
					<select class="form-control classify" name="class_id1">
						<option value="-1">请选择</option>
						@foreach($classify as $val)
							<option value="{{$val->class_id}}">{{$val->class_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<a href="javascript:void(0)" class="btn btn-success ajax-post aa" target-form="form-horizontal">提 交</a>
				<button type="reset" class="btn btn-white">重 置</button>
			</div>
		
		</form>
	
	</div>

</div>
@endsection

@section('afterscript')
<script src="/Admin/assets/js/jquery-validate/jquery.validate.min.js"></script>
@endsection

@section('footscript')
<script>
	highlight_subnav('/admin/user/index');

	$(".classify").on('change',function(){
		$(this)
	})
</script>
@endsection