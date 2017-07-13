<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>订单发货</strong></div>
  <div class="body-content">

    <form id="form" class="form-x"  enctype="multipart/form-data">
    <?php echo csrf_field(); ?>  
    
      <if condition="$iscid eq 1">

        <div class="form-group">
        <div class="label">
          <label>快递:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="goods_sn" value=""/>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>快递单号:</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="expressid" value=""/>
        </div>
      </div>

        
      <div class="clear"></div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="button" name="send"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>

<script>
  $("button[name='send']").on("click", function() {
    var id = {{$id}};
    var expressid = $("input[name='expressid']").val();
    $.ajax({
      type:"get",
      url:window.location.protocol+"//"+window.location.host+"/admin/send",
      data:{
        id:id,
        expressid:expressid
      },
      success:function(data) {
        
        if(data > 0) {
          alert("发货成功");
          window.location.href = window.location.protocol+"//"+window.location.host+"/admin/order_list";
        } else {
          alert("发货失败");
        }
      }
    });
  });
</script>
