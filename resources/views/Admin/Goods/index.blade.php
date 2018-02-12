@extends('Admin.Public.public')
@section('body')
<div class="row">
	<div class="col-md-12">
	
		<div class="panel panel-default">
			<div class="panel-body">
				
				<div class="table-wrapper"><div class="btn-toolbar"><div class="btn-group focus-btn-group"><a href="/admin/goods/addinfo" class="btn btn-default">新增</a></div><div class="btn-group dropdown-btn-group pull-right"><button class="btn btn-default">Display all</button><button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Display <span class="caret"></span></button><ul class="dropdown-menu"><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-1" id="toggle-idd496bb567b703-col-1" value="idd496bb567b703-col-1" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-1">Last Trade</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-2" id="toggle-idd496bb567b703-col-2" value="idd496bb567b703-col-2" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-2">Trade Time</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-3" id="toggle-idd496bb567b703-col-3" value="idd496bb567b703-col-3" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-3">Change</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-4" id="toggle-idd496bb567b703-col-4" value="idd496bb567b703-col-4" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-4">Prev Close</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-5" id="toggle-idd496bb567b703-col-5" value="idd496bb567b703-col-5" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-5">Open</label></li><li class="checkbox-row"><div class="cbr-replaced cbr-checked"><div class="cbr-input"><input type="checkbox" name="toggle-idd496bb567b703-col-6" id="toggle-idd496bb567b703-col-6" value="idd496bb567b703-col-6" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div> <label for="toggle-idd496bb567b703-col-6">Bid</label></li></ul></div></div><div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
				
					<table cellspacing="0" class="table table-small-font table-bordered table-striped">
						<thead>
							<tr>
								<th id="idd496bb567b703-col-0">商品名</th>
								<th data-priority="1" id="idd496bb567b703-col-1">商品类别</th>
								<th data-priority="1" id="idd496bb567b703-col-1">商品数量</th>
								<th data-priority="3" id="idd496bb567b703-col-2">状态</th>
								<th data-priority="1" id="idd496bb567b703-col-3">商品价格</th>
								<th data-priority="3" id="idd496bb567b703-col-4">促销价格</th>
								<th data-priority="3" id="idd496bb567b703-col-4">是否会员专享</th>
								<th data-priority="3" id="idd496bb567b703-col-4">会员专享价</th>
								<th data-priority="3" id="idd496bb567b703-col-4">商品成本价</th>
								<th data-priority="3" id="idd496bb567b703-col-4">目前是否参与活动</th>
							</tr>
						</thead>
						<tbody>
							@foreach($list as $val)
								<td>{{$val->goods_name}}</td>
								<td>{{$val->goods_num}}</td>
								<td>{{$val->status}}</td>
								<td>{{$val->goods_price}}</td>
								<td>{{$val->goods_sale_price}}</td>
								<td>{{$val->is_member}}</td>
								<td>{{$val->goods_member_price}}</td>
								<td>{{$val->goods_cost_price}}</td>
								<td>{{$val->is_activity}}</td>
							@endforeach
						</tbody>
					</table>
					<div style="float:right">
						{!! $list->render() !!}
					</div>
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
</div>
@endsection

@section('footscript')
<script>
	highlight_subnav('/admin/user/index');
</script>
@endsection