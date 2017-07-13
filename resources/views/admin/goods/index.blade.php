<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="{{asset('style/css/pintuer.css')}}">
<link rel="stylesheet" href="{{asset('style/css/admin.css')}}">
<script src="{{asset('style/js/jquery.js')}}"></script>
<script src="{{asset('style/js/pintuer.js')}}"></script>
<script src="{{asset('style/js/laydate.dev.js')}}"></script>
</head>
<body>

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <form method="get" action="" id="listform">
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="{{url('admin/goods_add')}}"> 添加内容</a> </li>
        <li>搜索：</li>
        <li>
        新品:
        <select name="is_new" style="padding:5px 15px; border:1px solid #ddd;">
        <!-- onchange="changeishome(this)" -->
            <option <?php if($search['is_new']=='') echo 'selected' ?> value="">新品</option>
            <option <?php if($search['is_new']=='1') echo 'selected' ?> value="1">是</option>
            <option <?php if($search['is_new']=='0') echo 'selected' ?> value="0">否</option>
          </select>
          热销:
          <select name="is_hot" style="padding:5px 15px; border:1px solid #ddd;">
          <!-- onchange="changeisvouch(this)" -->
            <option <?php if($search['is_hot']=='') echo 'selected' ?> value="">热销</option>
            <option <?php if($search['is_hot']=='1') echo 'selected' ?> value="1">是</option>
            <option <?php if($search['is_hot']=='0') echo 'selected' ?> value="0">否</option>
          </select>
          推荐:
          <select name="is_recommend" style="padding:5px 15px; border:1px solid #ddd;">
          <!-- onchange="changeistop(this)" -->
            <option <?php if($search['is_recommend']=='') echo 'selected' ?> value="">推荐</option>
            <option <?php if($search['is_recommend']=='1') echo 'selected' ?> value="1">是</option>
            <option <?php if($search['is_recommend']=='0') echo 'selected' ?> value="0">否</option>
          </select>
          是否上架:
          <select name="is_on_sale" style="padding:5px 15px; border:1px solid #ddd;">
          <!-- onchange="changeistop(this)" -->
            <option <?php if($search['is_on_sale']=='') echo 'selected' ?> value="">上架</option>
            <option <?php if($search['is_on_sale']=='1') echo 'selected' ?> value="1">是</option>
            <option <?php if($search['is_on_sale']=='0') echo 'selected' ?> value="0">否</option>
          </select>
          &nbsp;&nbsp;&nbsp;
        </li>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
              <option value="">请选择分类</option>
			  @if($goodtypes)
			  	@foreach($goodtypes as $val)
				<?php
					$m = substr_count($val['path'],",")-1;
					$nbsp = str_repeat("&nbsp;",$m*10);
				?>
              		<option <?php echo $search['cid']==$val['id']? 'selected':'' ?> value="{{$val['id']}}">{{$nbsp."|--".$val['name']}}</option>
              	@endforeach
              @endif
            </select>
          </li>
        </if>
        <li>
          <input type="text" value="<?php if(!empty($search['keywords'])) echo $search['keywords'] ?>" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <input type="submit" class="button border-main icon-search" value="搜索" onclick="changesearch()" ></li>
      </ul>
    </div>
    </form>
    <table class="table table-hover text-center">
      <tr>
        <th width="3%" style="text-align:left; padding-left:10px;">ID</th>
        <th width="1%">排序</th>
        <th>图片</th>
        <th width="15%">名称</th>
        <th>新品</th>
        <th>热销</th>
        <th>推荐</th>
        <th>是否上架</th>
        <th>分类名称</th>
        <th width="10%">更新时间</th>
        <th width="20%">操作</th>
      </tr>
      <volist name="list" id="vo">
<!-- 商品列表 -->
	        @foreach($goods as $val)
	        <tr>
	          <td style="text-align:left; padding-left:10px;"><input type="checkbox" name="id[]" value="{{$val['goods_id']}}" />
	          </td>
	          <td><input type="text" name="sort[1]" value="{{$val['sort']}}" style="width:30px; text-align:center; border:1px solid #ddd; padding:7px 0;" /></td>
	          @if($val['cover_img'])
	          <td width="10%" ><img style="border:1px #ccc solid" src="../{{$val['cover_img']}}" alt="" width="70" height="50" /></td>
	          @else
	            <td width="10%"><img src="../style/images/lietu.png" alt="" width="70" height="50" /></td>
	          @endif
	          <td>{{$val['goods_name']}}</td>
	          <!-- 新品 -->
	          <td>
	          @if($val['is_new']==1)
		          <a href="javascript:;">
		          	<img name="is_new" value="{{$val['is_new']}}" src="../style/images/icon_right_s.png" />
		          </a>
		      @elseif($val['is_new']==0)
		      		<a href="javascript:;">
		          	<img name="is_new" value="{{$val['is_new']}}" src="../style/images/icon_error_s.png" />
		          </a>
		      @endif
	          </td>
	          <!--热销-->
	          <td>
	          @if($val['is_hot']==1)
		          <a href="javascript:;">
		          	<img name="is_hot" value="{{$val['is_hot']}}" src="../style/images/icon_right_s.png" />
		          </a>
		      @elseif($val['is_hot']==0)
		      		<a href="javascript:;">
		          	<img name="is_hot" value="{{$val['is_hot']}}" src="../style/images/icon_error_s.png" />
		          </a>
		      @endif
		      </td>
	          <td>
	          @if($val['is_recommend']==1)
		          <a href="javascript:;">
		          	<img name="is_recommend" value="{{$val['is_recommend']}}" src="../style/images/icon_right_s.png" />
		          </a>
		      @elseif($val['is_recommend']==0)
		      		<a href="javascript:;">
		          	<img name="is_recommend" value="{{$val['is_recommend']}}" src="../style/images/icon_error_s.png" />
		          </a>
		      @endif
	          </td>
			  
			  <td>
	          @if($val['is_on_sale']==1)
		          <a href="javascript:;">
		          	<img name="is_on_sale" value="{{$val['is_on_sale']}}" src="../style/images/icon_right_s.png" />
		          </a>
		      @elseif($val['is_on_sale']==0)
		      		<a href="javascript:;">
		          	<img name="is_on_sale" value="{{$val['is_on_sale']}}" src="../style/images/icon_error_s.png" />
		          </a>
		      @endif
	          </td>

	          <td>{{$val['name']}}</td>
	          <td>{{$val['updated_at']}}</td>
	          <td><div class="button-group"> <a class="button border-main" href="{{url('/admin/goods_edit')}}/{{$val['goods_id']}}"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="{{url('/admin/goods_del')}}/{{$val['goods_id']}}" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
	        </tr>
	        @endforeach

<!-- 商品列表end -->
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="10" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a> <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a> 
          
          <!-- 移动到：
          <select name="movecid" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecate(this)">
            <option value="">请选择分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
          </select>
          <select name="copynum" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecopy(this)">
            <option value="">请选择复制</option>
            <option value="5">复制5条</option>
            <option value="10">复制10条</option>
            <option value="15">复制15条</option>
            <option value="20">复制20条</option>
          </select> -->

          </td>
      </tr>
      <tr>
        <td colspan="8">
    		<div class="pagelist">
				{{$goods->links()}}
    		</div>
        </td>
        
      </tr>
    </table>
  </div>

<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
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

//批量删除
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
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

$(function(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


	//新品
	$('img[name=is_new]').click(function(){
		// alert('new');
		var that = $('img[name=is_new]');
		var id = $(this).parent().parent().siblings('td').children('input[type=checkbox]').val();
		var is_new = $(this).attr('value');

		if(is_new==1){
			var url = '../style/images/icon_error_s.png';
			$(this).attr('value',0);
			$(this).attr('src',url);
		}else if(is_new==0){
			var url = '../style/images/icon_right_s.png';
			$(this).attr('value',1);
			$(this).attr('src',url);
		}


		// alert(is_new);
		$.ajax({
			url:'/admin/goods_list/{new}',
		   data:{id:id,is_new:is_new},
		   type:'POST',
	   dataType:'JSON',

	   		susscee:function(data){

	   		}

		});

	});

	//热销
	$('img[name=is_hot]').click(function(){
		// alert('hot');
		var that = $('img[name=is_hot]');
		var id = $(this).parent().parent().siblings('td').children('input[type=checkbox]').val();
		var is_hot = $(this).attr('value');

		if(is_hot==1){
			var url = '../style/images/icon_error_s.png';
			$(this).attr('value',0);
			$(this).attr('src',url);
		}else if(is_hot==0){
			var url = '../style/images/icon_right_s.png';
			$(this).attr('value',1);
			$(this).attr('src',url);
		}


		// alert(is_hot);
		$.ajax({
			url:'/admin/goods_list/{hot}/1',
		   data:{id:id,is_hot:is_hot},
		   type:'POST',
	   dataType:'JSON',

	   		susscee:function(data){

	   		}

		});

	});


	//推荐
	$('img[name=is_recommend]').click(function(){
		// alert('recommend');
		var that = $('img[name=is_recommend]');
		var id = $(this).parent().parent().siblings('td').children('input[type=checkbox]').val();
		var is_recommend = $(this).attr('value');

		if(is_recommend==1){
			var url = '../style/images/icon_error_s.png';
			$(this).attr('value',0);
			$(this).attr('src',url);
		}else if(is_recommend==0){
			var url = '../style/images/icon_right_s.png';
			$(this).attr('value',1);
			$(this).attr('src',url);
		}


		// alert(is_recommend);
		$.ajax({
			url:'/admin/goods_list/{recommend}/1/2',
		   data:{id:id,is_recommend:is_recommend},
		   type:'POST',
	   dataType:'JSON',

	   		susscee:function(data){

	   		}

		});

	});

	//是否上架
	$('img[name=is_on_sale]').click(function(){
		// alert('recommend');
		var that = $('img[name=is_on_sale]');
		var id = $(this).parent().parent().siblings('td').children('input[type=checkbox]').val();
		var is_on_sale = $(this).attr('value');

		if(is_on_sale==1){
			var url = '../style/images/icon_error_s.png';
			$(this).attr('value',0);
			$(this).attr('src',url);
		}else if(is_on_sale==0){
			var url = '../style/images/icon_right_s.png';
			$(this).attr('value',1);
			$(this).attr('src',url);
		}


		// alert(is_recommend);
		$.ajax({
			url:'/admin/goods_list/{is_on_sale}/1/2/3',
		   data:{id:id,is_on_sale:is_on_sale},
		   type:'POST',
	   dataType:'JSON',

	   		susscee:function(data){

	   		}

		});

	});


});



</script>

</body>
</html>
