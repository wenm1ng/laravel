@extends('Admin.Public.public')
@section('headscript')
<link rel="stylesheet" href="/css/Huploadify.css">
<script src="/js/jquery.Huploadify.js"></script>
@endsection
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
				<div class="col-sm-3">
					<input type="text" class="form-control" name="goods_name" id="field-1">
				</div>
			</div>

			<div class="form-group-separator"></div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="class_id1">商品类别</label>
				
				<div class="col-sm-2">
					<select class="form-control classify" name="class_id1">
						<option value="-1">请选择</option>
						@foreach($classify as $val)
							<option value="{{$val->class_id}}">{{$val->class_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="form-group-separator"></div>

			<div class="form-group" >
				<label class="col-sm-2 control-label" for="field-1">商品数量</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" name="goods_num">
				</div>
			</div>

			<div class="form-group-separator"></div>

			<div class="form-group" >
				<label class="col-sm-2 control-label" for="field-1">商品价格</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" name="goods_price">
				</div>
			</div>

			<div class="form-group-separator"></div>

			<div class="form-group" >
				<label class="col-sm-2 control-label" for="field-1">商品成本价</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" name="goods_cost_price">
				</div>
			</div>
			
			<div class="form-group-separator"></div>

			<div class="form-group" >
				<label class="col-sm-2 control-label" for="field-1">商品图片</label>
				<div id="upload">
					
				</div>
				<div class="input-group col-sm-12 upload_img">
				</div>
			</div>

			<div class="form-group-separator"></div>
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
	$(function(){
		highlight_subnav('/admin/user/index');

		$(".classify").on('change',function(){
			var that = $(this);
			var class_id = that.val();

			//删除上次操作的select
			that.parent().nextAll('div').remove();
			$.ajax({
				type:'post',
				url:'/admin/goods/get_classify',
				data:{class_id:class_id},
				async:true,
				headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
				success:function(data){
					console.log(data);
					if(data.status){
						var option = '<option value="-1">请选择</option>';
						$.each(data.data, function(index, val) {
							option += '<option value="'+val.class_id+'">'+val.class_name+'</option>';
						});
						var select = $('<div class="col-sm-2"><select class="form-control classify2" name="class_id2">'+option+'</select></div>');
						that.parent().after(select);

						$(".classify2").on('change',function(){
							var that = $(this);
							var class_id = that.val();

							//删除上次操作的select
							that.parent().nextAll('div').remove();
							$.ajax({
								type:'post',
								url:'/admin/goods/get_classify',
								data:{class_id:class_id},
								async:true,
								headers:{'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')},
								success:function(data){
									console.log(data);
									if(data.status){
										var option = '<option value="-1">请选择</option>';
										$.each(data.data, function(index, val) {
											option += '<option value="'+val.class_id+'">'+val.class_name+'</option>';
										});
										var select = $('<div class="col-sm-2"><select class="form-control" name="class_id3">'+option+'</select></div>');
										that.parent().after(select);
									}else{
										// alert(11);
									}

								},
								error:function(data){
									alert('ajax失败');
								}
							})
						})
					}else{
						// alert(11);
					}

				},
				error:function(data){
					alert('ajax失败');
				}
			})
		})
	})
	
	function delimg(obj){
		$(obj).parent('.img_div').remove();
	}

	// 商品图片上传
    $('#upload').Huploadify({
		auto:true,
	    fileTypeExts:'*.jpg; *.png;',
	    multi:false,//是否允许选择多个文件
	    fileSizeLimit:102400,//允许上传的文件大小，单位KB
	    fileObjName: 'download',//在后端接受文件的参数名称，如PHP中的$_FILES['file']
	    buttonText: '点击上传',//上传按钮上的文字
	    uploader:"/admin/file/upload_img",
	    formData:{'_token':$('meta[name="_token"]').attr('content')},
	    onUploadStart: function(){
	            var index = layer.load();
	            var num = $("#upload").parents('.form-group').find('.del_span').length + 1;
	            // alert(num);
	            if(num > 5){
	            	layer.alert('最多只能上传5张图片',{icon:5},function(){
	                	layer.close(index);
	            	});
	            	return false;
	            }
	        },
	    onUploadComplete:function(data){

	        var data = $.parseJSON(data);
	    	console.log(data);
	        var src = '';
	        var index = layer.load();               

	        if(data.status){
	            layer.close(index);
	            
	            // var num = $("#upload").parents('.form-group').find('.del_span').length + 1;

	            if(data.download['ext'] == 'jpg' || data.download['ext'] == 'png'){
	            	if($('.upload_img').find('.img_div')){
	            		var num = $('.upload_img').find('.img_div').length + 1;
	            	}else{
	            		var num = 1;
	            	}

	                $('.upload_img').append(
	                    '<div class="img_div"><span>'+data.download['name']+'</span><a class="del_span" href="javascript:;" onclick="delimg(this)">&emsp;删除</a><br/><img class="viewer-item" width="200px" style="padding:5px;box-shadow: 0 0 3px #999;margin: 2px;" src="' + data.download['savepath'] + '"/><input type="hidden" name="goods_img'+ num +'" value="'+ data.download['savepath'] +'"></input></div>'
	                );
	                // $("#upload").toggle();

	            }else if(data.download['ext'] == 'mp3'){
	              
	            }else{
	                $('.upload_img').append('<div class="img_div"><span class="wenj">附件</span><a class="del_span" href="javascript:;" onclick="delimg(this)">&emsp;删除</a>'+'<h4>'+data.download['name']+'</h4></div>');
	                // $("#upload").toggle();
	            }

	            
	        } else {

	            layer.alert(data.msg,{icon:5},function(){
	                layer.close(index);
	            });
	        }
	    }
	});
</script>
@endsection