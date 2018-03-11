@extends('Home.Public.public')
@section('headscript')

<link href="/css/user_style.css" rel="stylesheet" type="text/css" />
<!-- <link href="/css/base.css" rel="stylesheet" type="text/css" /> -->
<link href="/css/css.css" rel="stylesheet" type="text/css" />
<!-- <link href="/css/style1.css" rel="stylesheet" type="text/css" /> -->
<!-- <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script> -->
<script src="/js/jquery.simpleGal.js"></script>
<script type="text/javascript" src="/js/jquery.imagezoom.min.js"></script>
<script src="/layer/layer.js" type="text/javascript"></script>

@endsection
@section('body')
<div class="user_style clearfix">
 <div class="user_center clearfix">
   <div class="left_style">
     <div class="menu_style">
     <div class="user_title"><a href="用户中心.html">用户中心</a></div>
     <div class="user_Head">
     <div class="user_portrait">
      <a href="#" title="修改头像" class="btn_link"></a> <img src="images/people.png">
      <div class="background_img"></div>
      </div>
      <div class="user_name">
       <p><span class="name">化海天堂</span><a href="#">[修改密码]</a></p>
       <p>访问时间：2016-1-21 10:23</p>
       </div>           
     </div>
     <div class="sideMen">
     <!--菜单列表图层-->
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_1"></em>订单管理</dt>
      <dd>
        <ul>
          <li> <a href="用户中心-我的订单.html">我的订单</a></li>
          <li> <a href="用户中心-收货地址.html">收货地址</a></li>
          <li> <a href="用户中心-产品预订.html">产品预订</a></li>
        </ul>
      </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_2"></em>会员管理</dt>
        <dd>
      <ul>
        <li> <a href="#"> 用户信息</a></li>
        <li> <a href="#"> 我的收藏</a></li>
        <li> <a href="#"> 我的留言</a></li>
        <li> <a href="#">我的标签</a></li>
        <li> <a href="#"> 我的推荐</a></li>
        <li><a href="#"> 我的评论</a></li>
      </ul>
    </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_3"></em>账户管理</dt>
      <dd>
       <ul>
       <li><a href="用户中心-账户管理.html">账户余额</a></li>
        <li><a href="用户中心-消费记录.html">消费记录</a></li>   
       <li><a href="#">跟踪包裹</a></li>
       <li><a href="#">资金管理</a></li>
      </ul>
     </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_4"></em>分销管理</dt>
      <dd>
        <ul>
          <li> <a href="#">店铺管理</a></li>
          <li> <a href="#">我的盟友</a></li>
          <li> <a href="#">我的佣金</a></li>
          <li> <a href="#">申请提现</a></li>
        </ul>
      </dd>
    </dl>
    </div>
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script>
   </div>
 </div>
 <!--右侧样式-->
  <div class="right_style">
  <div class="title_style"><em></em>订单管理</div> 
   <div class="Order_form_style">
      <div class="Order_form_filter">
       <a href="#" class="on">全部订单（23）</a>
       <a href="#" class="">代付款（2）</a>
       <a href="#" class="">代发货（3）</a>
       <a href="#" class="">待收货（5）</a>
       <a href="#" class="">退货/退款（0）</a>
       <a href="#" class="">交易成功（0）</a>
       <a href="#" class="">交易关闭（0）</a>
      </div>
      <div class="Order_Operation">
     <div class="left"> <label><input name="" type="checkbox" value=""  class="checkbox"/>全选</label> <input name="" type="submit" value="批量确认收货"  class="confirm_Order"/></div>
     <div class="right_search"><input name="" type="text"  class="add_Ordertext" placeholder="请输入产品标题或订单号进行搜索"/><input name="" type="submit" value="搜索订单"  class="search_order"/></div>
      </div>
      <div class="Order_form_list">
         <table>
         <thead>
          <tr><td class="list_name_title0">商品</td>
          <td class="list_name_title1">单价(元)</td>
          <td class="list_name_title2">数量</td>
          <td class="list_name_title4">实付款(元)</td>
          <!-- <td class="list_name_title5">商品状态</td> -->
          <td class="list_name_title6">操作</td>
         </tr>
         </thead> 

         @foreach($cart_list as $key => $val)
         <tbody>       
           <tr class="Order_info"><td colspan="6" class="Order_form_time"><input name="goods[]" type="checkbox" value="0" goods-id="{{$val['goods_id']}}" class="checkbox goods_checkbox"/>添加时间：2015-12-3 | 商品id：{{$val['goods_id']}} <em></em></td></tr>
           <tr class="Order_Details">
           <td colspan="3">
           <table class="Order_product_style">
           <tbody>
           <tr>
           <td>
            <div class="product_name clearfix">
            <a href="#" class="product_img"><img src="{{$val['goods_img1']}}" width="80px" height="80px"></a>
            <a href="3" class="p_name">{{$val['goods_name']}}</a>
            <p class="specification">礼盒装20个/盒</p>
            </div>
            </td>
            <td>{{$val['goods_price']}}</td>
           <td>{{$val['count']}}</td>
            </tr>
            </tbody>
            </table>
           </td>   
           <td class="split_line">{{$val['goods_price']}}</td>
           <!-- <td class="split_line"><p style="color:#F30">已发货，待收货</p></td> -->
           <td class="operating">
            <!-- <span>请至少选择一件商品哦~</span> -->
            <a href="#" class="Delivery_btn count">去结算</a>            
             <!-- <a href="#">查看订单</a>
             <a href="#">查看物流</a>
             <a href="#">联系客服</a>
             <a href="#">删除</a> -->
           </td>
           </tr>
           </tbody>
			@endforeach
        </table>
    </div>
     </div>
   </div>
   <script>
            $(document).ready(function(){
              $('.Order_form_style input').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
              });
            });
            </script>
  </div>
 </div>
</div>


<div id="fade" class="black_overlay"> </div>
<div id="MyDiv" class="white_content" style="width:35%;height:50%;margin-left:20%">
    <div  style="width:100%; height:30px; background:#1ba67f; padding-left:15px; color:#fff; line-height:30px; font-size:14px;"> 
      <span onclick="CloseDiv('MyDiv','fade')">
        <input type="button" class="addbtn" style="float:right;color:black;" value="×">
        </span>商品加入货仓 </div>
    <div class="dialogbox">
        <div class="loginbox fl">
            <div class="tab">
                <ul>
                    <li class="on">欢迎登陆</li>
                    <!-- <li>我是卖家</li> -->
                </ul>
            </div>
            <div class="conlist">
                <div class="conbox" style="display:block;">
                    <!-- {{ csrf_field() }} -->
                <p>
                        <div class="veri" style="height:1px"></div>
                        <input type="text" name="username" class="loginusername">
                    </p>
                    <p>
                        <input type="password" name="password" class="loginuserpassword">
                    </p>
                    <p><span class="fl fntz14 margin-t10"><a href="/home/user/register" style="color:#ff6000">立即注册</a></span><span class="fr fntz12 margin-t10"><a href="/home/user/forget">忘记密码？</a></span></p>
                    <p>
                        <input type="submit" class="loginbtn" value="登  录">
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('footscript')
<script>
  //弹出隐藏层
  function ShowDiv(show_div,bg_div){
  document.getElementById(show_div).style.display='block';
  document.getElementById(bg_div).style.display='block' ;
  var bgdiv = document.getElementById(bg_div);
  bgdiv.style.width = document.body.scrollWidth;
  // bgdiv.style.height = $(document).height();
  $("#"+bg_div).height($(document).height());
  };
  //关闭弹出层
  function CloseDiv(show_div,bg_div)
  {
  document.getElementById(show_div).style.display='none';
  document.getElementById(bg_div).style.display='none';
  };


  $('.count').click(function(){
    //判断有无选中商品
    $('.goods_checkbox').each(function(index, el) {
      if($(this).parent('div').hasClass('checked')){
        //先判断有无登录
        $.ajax({
          type:'post',
          url:'/home/cart/check_login',
          headers:{'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')},
          success:function(data){
            if(data.status){
              //已登录
               var arr = new Array();
              $(this).parents('tbody').find('.checkbox').each(function(index, el) {
                if($(this).is(':checked')){
                  arr.push($(this).val());
                }
              });
              console.log(arr);
            }else{
              //未登录
              // login_modal.modal();
              ShowDiv('MyDiv','fade');
            }
          },
          error:function(data){
            alert(22);
          }
        })
      }else{
        $('.count').before('<span>请至少选择一件商品哦~</span>');
        setTimeout(function(){
          $('.count').prev().remove();
        }, 1000)
      }
    });
  })

  $('.loginbtn').click(function(){
    username = $('input[name="username"]').val();
    password = $('input[name="password"]').val();

    var key_arr = new Array(); 
    var id_arr = new Array();
    $('.goods_checkbox').each(function(index, el) {
       key_arr.push($(this).val());
       id_arr.push($(this).attr('goods-id'));
    });

    that = $('.veri');

    $.ajax({
      'type':'post',
      'url':'/home/cart/login',
      'data':{username:username,password:password,key_arr:key_arr,id_arr:id_arr},
      'headers':{'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')},
      'success':function(data){
        // console.log(data);
        if(data.status){
          //登录
          alert('操作成功');
        }else{
          //提示信息
          that.html('');
          that.append('<span style="color:red">帐号或密码错误，请重新输入或者<a href="/home/user/forget" style="color:#90B831">找回密码</a></span>');
        }
      },
      'error':function(data){
        alert(2);
      }
    })
  })
</script>
@endsection