<?php
$state = [0=>'禁用',1=>'普通',2=>'管理员'];
$sex = [0=>'男',1=>'女'];

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
      <!-- @if($pass == 1)
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      @endif -->  
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
          <!-- <a href="{{url('/admin/search')}}" class="button border-main icon-search" > 搜索</a></li> -->

      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>账户</th>
        <th>性别</th>
        <th>电话</th>
          <th>邮编</th>
        <th>邮箱</th>
        <th width="25%">地址</th>
        <th>状态</th>
         <th width="100">创建时间</th>
        <th>操作</th>       
      </tr>

      @foreach($user as $v)
        <tr class="search_name">
          <td><input type="checkbox" name="id[]" value="1" />
            {{$v['id']}}</td>
          <td>{{$v['username']}}</td>
          <td>{{$sex[$v['sex']]}}</td>
          <td>{{$v['phone']}}</td>
            <td>{{$v['code']}}</td>
          <td>{{$v['email']}}</td>
           <td>{{$v['address']}}</td>
          <td>{{$state[$v['state']]}}</td>
          <td>{{$v['created_at']}}</td>
          <td><div class="button-group">
              <a class="button border-red" href="{{url('/admin/user_edit/'.$v['id'])}}"><span class="icon-trash-o"></span> 审核</a>
            <!--   <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a></div></td> -->
                 @if($pass == 1) <a class="button border-red" href="{{url('/admin/user_del/'.$v['id'])}}"><span class="icon-trash-o"></span> 删除</a>@endif
        </tr>
      @endforeach

      <tr>
        <!-- <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">下一页</a><a href="">尾页</a> </div></td> -->
      {{$user->links()}}
      </tr>

    </table>
  </div>
</form>
<script type="text/javascript">

        $.ajaxSetup
        ({
                headers: 
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        function changesearch()
        {
           var val = $('.input').val();

          $.post("/admin/search", {name:val}, function(data)
            {
             
              $(".search_name").remove();
              $(".new").remove();
            //    for(var i=0; i<data.length; i++)
            //    {
            //     $(".search_name").children().html(data[i]['id']).next().html(data[i]['username']).next().html(data[i]['sex']).next().html(data[i]['phone']).next().html(data[i]['code']).next().html(data[i]['email']).next().html(data[i]['address']).next().html(data[i]['state']).next().html(data[i]['created_at']);
                
            // var a = "<td></td><td></td><td>}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td><div class='button-group'><a class='button border-red' href=''><span class='icon-trash-o'></span> 审核</a><a class='button border-red' href=''><span class='icon-trash-o'></span> 删除</a>";
            //   }
            $("table").append(data);
              // console.log($("table"));
              
            });
        };

//function del(id){
//	if(confirm("您确定要删除吗?")){
//
//	}
//}



// $("#checkall").click(function(){
//  $("input[name='id[]']").each(function(){
// 	  if (this.checked) {
// 		  this.checked = false;
// 	  }
// 	  else {
// 		  this.checked = true;
// 	  }
//  });
// })
//
// function DelSelect(){
// 	var Checkbox=false;
// 	 $("input[name='id[]']").each(function(){
// 	  if (this.checked==true) {
// 		Checkbox=true;
// 	  }
// 	});
// 	if (Checkbox){
// 		var t=confirm("您确认要删除选中的内容吗？");
// 		if (t==false) return false;
// 	}
// 	else{
// 		alert("请选择您要删除的内容!");
// 		return false;
// 	}
// }

</script>
</body></html>
