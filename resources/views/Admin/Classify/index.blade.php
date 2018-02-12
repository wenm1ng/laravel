@extends('Admin.Public.public')
@section('headscript')
<style>
	._flod{
		float:left;
		color:#2C2E2F;
		font-size: 15px;
		font-weight: bold;
		margin-left:20px;
	}

	.left{
		float:left;
		height:20px;
		width:100%;
		margin-top:10px;
	}

	.icon-margin{
		margin-left:40px;
	}

	.img-margin{
		margin-left:170px;
	}

	.icon-margin1{
		margin-left:100px;
	}

	.__flod{
		float:left;
		color:#2C2E2F;
		font-size: 15px;
		font-weight: bold;
	}

	.float{
		float:left;
	}

	.modal-backdrop{
		z-index: -1;
	}

	.modal{
		position:absolute;
		left:-20%;
		top:20%;
	}
</style>
@endsection

@section('body')
<!-- <div class="row">
	<div class="col-md-9">
		
		<div class="tocify-content">

			<div class="icon-collection">
			
				<div name="Icons" data-unique="Icons"></div><h2 class="page-header hidden">Icons</h2>
		
				<div class="fontawesome-icon-list">
		
				</div>
			
			</div>
		
		</div>
		
	</div>
</div> -->
<div class="row">
	<div class="col-md-12">
	
		<div class="panel-default">

				<div class="table-wrapper"><div class="btn-toolbar"><div class="btn-group focus-btn-group"><a href="#" class="btn btn-default addinfo">新增</a></div><div class="btn-group dropdown-btn-group pull-right"><button class="btn btn-default">Display all</button><button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Display <span class="caret"></span></button><ul class="dropdown-menu"><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-1" id="toggle-idd496bb567b703-col-1" value="idd496bb567b703-col-1" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-1">Last Trade</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-2" id="toggle-idd496bb567b703-col-2" value="idd496bb567b703-col-2" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-2">Trade Time</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-3" id="toggle-idd496bb567b703-col-3" value="idd496bb567b703-col-3" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-3">Change</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-4" id="toggle-idd496bb567b703-col-4" value="idd496bb567b703-col-4" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-4">Prev Close</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-5" id="toggle-idd496bb567b703-col-5" value="idd496bb567b703-col-5" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-5">Open</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-6" id="toggle-idd496bb567b703-col-6" value="idd496bb567b703-col-6" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-6">Bid</label></li></ul></div></div><div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
					<div class="left">
						<div class="_flod">折叠</div>
						<div class="_flod">分类名称</div>
					</div>
					@foreach($list as $val)
					<div class="left">
						@if($val->son_list)
						<i class="el-plus-circled cursor _flod icon-margin _up" data-id="{{$val->class_id}}"></i>
						@endif
						<div class="_flod">{{$val->class_name}}</div>
						<i class="el-plus _flod cursor addinfo" pid="{{$val->class_id}}"></i>
					</div>
					@if($val->son_list)
						<div class="left-inside" style="display:none">
							@foreach($val->son_list as $v)
							<div class="left">
								@if($v->grandson_list)
								<i class="el-plus-circled cursor _flod icon-margin1 _up" ></i>
								@endif
								<img src="/images/classify.jpg" alt="" class="float">
								<div class="__flod">{{$v->class_name}}</div>
								<i class="el-plus _flod cursor addinfo" pid="{{$v->class_id}}"></i>
								<input type="hidden" class="pid" parent-id="{{$v->pid}}">
							</div>
								@if($v->grandson_list)
								<div class="left-inside" style="display:none">
									@foreach($v->grandson_list as $vv)
										<div class="left">
											<img src="/images/classify.jpg" alt="" class="_flod img-margin">
											<div class="__flod">{{$vv->class_name}}</div>
											<input type="hidden" class="pid" parent-id="{{$vv->pid}}">
											<input type="hidden" class="ppid" pp-id="{{$v->pid}}">
										</div>
									@endforeach
								</div>
									
								@endif
							@endforeach
						</div>
					@endif
					@endforeach
					
				<script type="text/javascript">
				// This JavaScript Will Replace Checkboxes in dropdown toggles
				jQuery(document).ready(function($)
				{
					setTimeout(function()
					{
						$(".checkbox-row input").addClass('cbr');
						cbr_replace();
					}, 0);
				});
				</script>
		
		</div>
	</div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="modal-add" >
	<div class="modal-dialog">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">新增分类</h4>
			</div>
			
			<div class="modal-body">
				<form url="/admin/classify/addinfo" method="post" class="form-horizontal">
					<div class="form-group" >
						<label class="col-sm-2 control-label" for="field-1">分类名称</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="class_name" data-validate="required" data-message-required="分类名称不能为空" placeholder="请输入商品分类名称" id="field-1">
							<input type="hidden" name="pid" value="">
						</div>
					</div>
				</form>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-dismiss="modal">重置</button>
				<button type="button" class="btn btn-info ajax-post" target-form="form-horizontal">保 存</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footscript')
	<!-- <script src="/Admin/assets/js/uikit/js/uikit.min.js"></script>
	// <script src="/Admin/assets/js/uikit/js/addons/nestable.min.js"></script> -->
	<link rel="stylesheet" href="/Admin/assets/css/fonts/elusive/css/elusive.css">
	<script src="/Admin/assets/js/tocify/jquery.tocify.min.js"></script>
	<script>

		$(function(){
			highlight_subnav('/admin/classify/index');

			$('._up').click(function(){
				var that = $(this).parent();

				if($(this).hasClass('el-plus-circled')){
					$(this).removeClass('el-plus-circled');
					$(this).addClass('el-minus-circled');

					that.next().toggle();
					
				}else{
					$(this).removeClass('el-minus-circled');
					$(this).addClass('el-plus-circled');

					that.next().toggle();
					
				}

				$('.addinfo').click(function(){
					if($(this).hasClass('cursor')){
						var pid = $(this).attr('pid');
						$('input[name="pid"]').val(pid);
					}
					$("#modal-add").modal();
				})
			})

			$('.addinfo').click(function(){
				if($(this).hasClass('cursor')){
					var pid = $(this).attr('pid');
					$('input[name="pid"]').val(pid);
				}
				$("#modal-add").modal();
			})
		})

		
	</script>
@endsection