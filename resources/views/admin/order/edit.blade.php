<?php
$arr = [0=>'待发货',1=>'已发货',2=>'待评价',3=>'交易完成'];
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="_token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="{{asset('style/css/pintuer.css')}}">
<link rel="stylesheet" href="{{asset('style/css/admin.css')}}">
<script src="{{asset('style/js/jquery.js')}}"></script>
<script src="{{asset('style/js/pintuer.js')}}"></script>
<!-- ueditor -->
<script src="{{asset('./editor/ueditor.config.js')}}"></script>
<script src="{{asset('./editor/ueditor.all.min.js')}}"></script>
<!-- //ueditor -->
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改订单</strong></div>
  <div class="body-content">

    <form id="form" class="form-x" enctype="multipart/form-data">

      <if condition="$iscid eq 1">

        <div class="form-group">
        <div class="label">
          <label>ID:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_id" value="{{$data['id']}}" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>用户ID:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_userid" value="{{$data['userid']}}" disabled/>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>订单号:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_num" value="{{$data['ordernum']}}" disabled/>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>商品名:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_goodname" value="{{$data['goods']}}" disabled/>
        </div>
      </div>
      
      <div class="upload_class" style="width:1000px; height:auto;">
          <div class="form-group">
          <div class="label">
            <label>图片:</label>
          </div>
          <div class="field">
            <img src="{{asset('images/upic/4.jpg')}}" alt="" width="70" height="70" style="margin-left:15px;">
          </div>
        </div>
      </div>
      </if>
     
     <div class="form-group">
        <div class="label">
          <label>联系人:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_linkman" value="{{$data['linkman']}}" />
        </div>
      </div>

     <div class="form-group">
        <div class="label">
          <label>收货地址:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_address" value="{{$data['address']}}" />
        </div>
      </div>

     

     <div class="form-group">
        <div class="label">
          <label>手机:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_phone" value="{{$data['phone']}}" />
        </div>
      </div>  

     <div class="form-group">
        <div class="label">
          <label>购买时间:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_updated" value="{{$data['updated_at']}}" disabled/>
        </div>
      </div>  

     <div class="form-group">
        <div class="label">
          <label>总价:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="order_price" value="{{$data['total']}}" />
        </div>
      </div>

     <div class="form-group">
          <div class="label">
            <label>订单状态:</label>
          </div>
          <div class="field">
              <input type="text" class="input w50" name="order_statu" value="{{$arr[$data['status']]}}" disabled/>
            <div class="tips"></div>
          </div>
        </div>
        
      <div class="clear"></div>

      
    </form>
  </div>
</div>

</body></html>

<script>
    $("button[type='button']").on('click', function() {

        var that = $(this);

        $.ajax({
            type:"POST",
            url:"{{url('/admin/order_update')}}",
            data:{
                "id":$("input[name='order_userid']").val(),
                "order_linkman":$("input[name='order_linkman']").val(),
                "order_address":$("input[name='order_address']").val(),
                "order_code":$("input[name='order_code']").val(),
                "order_phone":$("input[name='order_phone']").val(),
                "order_price":$("input[name='order_price']").val()
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data) {

                if(data > 0) {
                    alert('修改成功');
                }else {
                    alert("修改失败");
                }
            }
        });
    });
</script>
