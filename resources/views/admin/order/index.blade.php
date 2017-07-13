<?php
    $arr = [0=>'待发货',1=>'已发货',2=>'待评价',3=>'交易完成'];
?>
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
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>ID</th>
        <th>用户ID</th>
        <th>订单号</th>       
        <th>商品名</th>
        <th>商品图</th>
        <th>联系人</th>
        <th>手机</th>
         <th>购买时间</th>
         <th>总价</th>
         <th>订单状态</th>
        <th>操作</th>       
      </tr>

        @foreach($data as $val)
        <tr>
          <td><input type="checkbox" name="id[]" />
            {{$val['id']}}</td>
          <td>{{$val['userid']}}</td>
          <td>{{$val['ordernum']}}</td>
          <td>{{$val['goods']}}</td>
           <td><img src="{{asset('images/upic/4.jpg')}}" alt="" width="70" height="70"></td>
          <td>{{$val['linkman']}}</td>
          <td>{{$val['phone']}}</td>
          <td>{{$val['updated_at']}}</td>
          <td>{{$val['total']}}</td>
          <td>{{$arr[$val['status']]}}</td>
          <!-- <td><div class="button-group"> <a class="button border-blue" href="{{url('/admin/order_edit/'.$val['id'])}}"><span class="icon-edit"></span> 编辑</a> </div></td> -->
          <td>
            @if($val['status'] == 0)

                <a href="{{url('/admin/order_send/'.$val['id'])}}">发货</a>
              
            @endif
            <a href="{{url('/admin/order_edit/'.$val['id'])}}">详情</a> 
            <a name='del' valid="{{$val['id']}}" >删除</a></td>
        </tr>

        @endforeach

        <td colspan="11"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

$("a[name='del']").on("click", function() {

  if(confirm("您确定要删除吗?")) {
    var that = $(this);
    var id = $(this).attr('valid');
   
    $.ajax({

        type:"get",
        url:"{{url('/admin/order_del')}}",
        data:"id="+id,
        success:function(data) {
            
            if(data > 0) {
              that.parent().parent().remove();
            }
           
        }
    });
      
  }
});




$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>
