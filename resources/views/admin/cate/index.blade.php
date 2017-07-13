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
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <!-- <button type="button" class="button border-yellow" onclick="window.location.href={{url('admin/cate_add')}}"><span class="icon-plus-square-o"></span> 添加分类</button> -->
    <a class="button border-yellow" href="{{url('admin/cate_add')}}"><span class="icon-plus-square-o"></span> 添加分类</a>
  </div>
  <table class="table table-hover text-center">

    <tr>
      <th width="5%">ID</th>
      <th width="15%">分类名称</th>
      <th width="10%">父类ID</th>
      <th width="10%">路径</th>
      <th width="15%">操作</th>
    </tr>
    @if($types_data)
    @foreach($types_data as $val)
    <?php
      $m = substr_count($val['path'],",")-1;
      $nbsp = str_repeat("&nbsp;",$m*10);
    ?>
    <tr>
      <td>{{$val['id']}}</td>
      <td>{{$nbsp."|--".$val['name']}}</td>
      <td>{{$val['pid']}}</td>
      <td>{{$val['path']}}</td>
      <td><div class="button-group"> 

          <a class="button border-main" href="{{url('admin/cate_child')}}/{{$val['id']}}/{{$val['pid']}}" ><span class="icon-add"></span>添加子分类</a> 

          <a class="button border-main" href="{{url('admin/cate_edit')}}/{{$val['id']}}/{{$val['pid']}}/{{$val['name']}}"><span class="icon-edit"></span> 修改</a> 
          <a class="button border-red" href="{{url('admin/cate_del')}}/{{$val['id']}}" onclick="return del(1,2)"><span class="icon-trash-o"></span> 删除</a>
          </div>
      </td>
    </tr>
    @endforeach
    @endif
  </table>

</div>
<div class="pagelist"> 
<!-- <a href="">上一页</a> 
<span class="current">1</span>
<a href="">2</a>
<a href="">3</a><a href="">下一页</a>
<a href="">尾页</a>  -->
{{$types_data->links()}}
</div>
<script type="text/javascript">
function del(id,mid){
  if(confirm("您确定要删除吗?")){      
    
  }
}
</script>

</body>
</html>
