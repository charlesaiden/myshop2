<?php
$level = [0=>'超级管理员',1=>'一般管理员',2=>'录入管理员',3=>'审核管理员'];

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
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder">管理员列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='{{url('admin/admin_add')}}'"><span class="icon-plus-square-o"></span> 添加管理员</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">管理员账号</th>
      <th width="10%">等级</th>
      <th width="10%">操作</th>
    </tr>
    @if($user_admin)
    @foreach($user_admin as $v)
    <tr>
      <td>{{$v['id']}}</td>
      <td>{{$v['username']}}</td>
      <td>{{$level[$v['level']]}}</td>
      <td><div class="button-group"> <a class="button border-main" href="{{url('/admin/admin_edit')}}/{{$v['id']}}"><span class="icon-edit"></span> 修改</a> 
      <a class="button border-red" onclick="return del(1,2)" href="{{url('/admin/admin_del')}}/{{$v['id']}}" ><span class="icon-trash-o"></span> 删除</a> </div></td>
      <!-- onclick="return del(1,2)" -->
    </tr>
    @endforeach
    @endif
    <tr>
        <td colspan="8">
          <div class="pagelist"> 
                <!-- <a href="">上一页</a> 
                <span class="current">1</span>
                <a href="">2</a>
                <a href="">3</a><a href="">下一页</a>
                <a href="">尾页</a>  -->
                {{$user_admin->links()}}
          </div>
        </td>
    </tr>
  </table>
  
</div>

<script type="text/javascript">
function del(id,mid){
  if(confirm("您确定要删除吗?")){      
    
  }
}
</script>

</body>
</html>
