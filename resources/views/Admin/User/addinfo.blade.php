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
	
		<form role="form" url="/admin/user/addinfo" method="post" class="validate form-horizontal" novalidate="novalidate">
			<div class="form-group" >
				<label class="col-sm-2 control-label" for="field-1">管理员账号</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" data-validate="required" data-message-required="管理员账号不能为空" placeholder="请输入管理员账号" id="field-1">
				</div>
			</div>

			<div class="form-group-separator"></div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-2">管理员邮箱</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" data-validate="email" data-message-email="请输入一个有效的电子邮件地址" placeholder="请输入管理员邮箱" id="field-2">
				</div>
			</div>
			<div class="form-group-separator"></div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-3">管理员密码</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="password" data-validate="minlength[6]" data-message-minlength="管理员密码最少6位" placeholder="请输入管理员密码" id="field-3">
				</div>
			</div>

			<div class="form-group-separator"></div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-4">管理账号权限</label>
				
				<div class="col-sm-10">
					<select class="form-control" name="is_super" id="field-4">
						<option value="-1">请选择</option>
						<option value="1">超级管理员</option>
						<option value="0">普通管理员</option>
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
</script>
@endsection