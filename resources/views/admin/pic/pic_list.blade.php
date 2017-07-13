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
    <link rel="stylesheet" href="{{asset('web_style/jquery-lightbox-0.5/css/jquery.lightbox-0.5.css')}}">
    <script src="{{asset('web_style/jquery-lightbox-0.5/js/jquery.js')}}"></script>
    <script src="{{asset('web_style/jquery-lightbox-0.5/js/jquery.lightbox-0.5.js')}}"></script>
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 轮播图管理</strong></div>
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
        <th width="120">图片ID</th>
        <th>图片路径</th>
        <th>图片</th>
        <th>图片名</th>
         <th width="100">创建时间</th>
        <th>操作</th>       
      </tr>

      @foreach($date as $v)
        <tr id='trid{{$v['id']}}'>
          <td><input type="checkbox" name="id[]" value="1" />
            {{$v['id']}}</td>
          <td>{{$v['url']}}</td>
          <td>
          <div id="element_id">
          <a href="{{asset('upload/'.$v['name'])}}" title="文字说明">
          <img src="{{asset('upload/'.$v['name'])}}" alt="" width="100">
          </a>
          </div>
          </td>
          <td>{{$v['name']}}</td>
          <td>{{$v['created_at']}}</td>
          <td><div class="button-group">
              <!-- <a class="button border-red" href="{{url('/admin/user_edit/'.$v['id'])}}"><span class="icon-trash-o"></span> 修改</a> -->



              <a class="button border-red" href="javascript:void(0)" onclick="return del({{$v['id']}})"><span class="icon-trash-o"></span> 删除</a></div></td>
                 <!--  <a class="button border-red" href="{{url('/admin/'.$v['id'].'/pic_del')}}"><span class="icon-trash-o"></span> 删除</a> -->




        </tr>
      @endforeach
<tr>{{$date->links()}}</tr>
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

function del(num)
{

   if(confirm("您确定要删除吗?"))
    {
      // console.log(num);

      var url = '/admin/'+num+'/pic_del';

        $.post(url,{id:num},function(response)
          {
            $('#trid'+num).fadeOut("slow");
          });
    }
};  

  $('#element_id a').lightBox();


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
