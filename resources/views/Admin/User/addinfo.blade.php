@extends('Admin.Public.public')
@section('body')
<div class="panel panel-default">
			
	<div class="panel-heading">
		<div class="panel-title">
			Input validation
		</div>
		
		<small class="text-small pull-right" style="padding-top:5px;">
			<code>data-validate="rule1,rule2,...,ruleN"</code>
		</small>
	</div>
	
	<div class="panel-body">
	
		<form role="form" id="form1" method="post" class="validate" novalidate="novalidate">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">管理员账号</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" data-validate="required" data-message-required="用户账号不能为空" placeholder="请输入管理员账号" id="field-1">
				</div>
			</div>
			<br>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-2">管理员邮箱</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" data-validate="email" data-message-email="请输入一个有效的电子邮件地址" placeholder="请输入管理员邮箱" id="field-2">
				</div>
			</div>
			<br>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-3">管理员密码</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="min_field" data-validate="minlength[6]" data-message-minlength="管理员密码最少6位" placeholder="请输入管理员密码" id="field-3">
				</div>
			</div>
			<br>
			
			<div class="form-group">
				<label class="control-label">Input Max Field</label>
				
				<input type="text" class="form-control" name="max_field" data-validate="maxlength[2]" placeholder="Maximum Length Field">
			</div>
			
			<div class="form-group">
				<label class="control-label">Numeric Field</label>
				
				<input type="text" class="form-control" name="number" data-validate="number" placeholder="Numeric Field">
			</div>
			
			<div class="form-group">
				<label class="control-label">URL Field</label>
				
				<input type="text" class="form-control" name="url" data-validate="required,url" placeholder="URL">
			</div>
			
			<div class="form-group">
				<label class="control-label">Credit Card Field</label>
				
				<input type="text" class="form-control" name="creditcard" data-validate="required,creditcard" placeholder="Credit Card">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success">Validate</button>
				<button type="reset" class="btn btn-white">Reset</button>
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