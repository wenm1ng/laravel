@extends('Admin.Public.public')
@section('headscript')
<style>
	
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
					<div></div>
					<table cellspacing="0" class="table">
						<thead>
							<tr>
								<th>折叠</th>
								<th>分类名称</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="el-plus-circled cursor"></i></td>	
								<td>啊啊啊</td>
								<tr>
									<td><img src="/images/classify.jpg" alt="" class="margin-40"></td>
									<td>2</td>
								</tr>
								<tr>
									<td><img src="/images/classify.jpg" alt="" class="margin-40"></td>
									<td>2</td>
								</tr>
							</tr>
						</tbody>
					</table>
				</div></div>
				
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

@section('footscript')
	<!-- <script src="/Admin/assets/js/uikit/js/uikit.min.js"></script>
	// <script src="/Admin/assets/js/uikit/js/addons/nestable.min.js"></script> -->
	<link rel="stylesheet" href="/Admin/assets/css/fonts/elusive/css/elusive.css">
	<script src="/Admin/assets/js/tocify/jquery.tocify.min.js"></script>
	<script>
		highlight_subnav('/admin/classify/index');

		$('.cursor').click(function(){
			if($(this).hasClass('el-plus-circled')){
				$(this).removeClass('el-plus-circled');
				$(this).addClass('el-minus-circled');
			}else{
				$(this).removeClass('el-minus-circled');
				$(this).addClass('el-plus-circled');
			}
		})
	</script>
@endsection