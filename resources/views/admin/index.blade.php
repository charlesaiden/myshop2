<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="style/css/pintuer.css">
    <link rel="stylesheet" href="style/css/admin.css">
    <script src="style/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">


<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="style/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="{{url('/')}}" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="javascript:alert('清除成功')" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="{{url('/admin/logout')}}"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="{{url('admin/info')}}" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
   <!--  <li><a href="pass.html" target="right"><span class="icon-caret-right"></span>用户列表</a></li>
    <li><a href="page.html" target="right"><span class="icon-caret-right"></span>产品分类</a></li>  
    <li><a href="adv.html" target="right"><span class="icon-caret-right"></span>产品列表</a></li>   
    <li><a href="book.html" target="right"><span class="icon-caret-right"></span>订单列表</a></li>     
    <li><a href="column.html" target="right"><span class="icon-caret-right"></span>栏目管理</a></li> -->
  </ul>
  <h2><span class="icon-user"></span>用户模块</h2>
  <ul style="display:block">
    <li><a href="{{url('admin/user_list')}}" target="right"><span class="icon-caret-right"></span>用户列表</a></li>
    <li><a href="{{url('admin/user_add')}}" target="right"><span class="icon-caret-right"></span>添加用户</a></li>
  </ul>

  <h2><span class="icon-pencil-square-o"></span>商品分类模块</h2>
  <ul>
    <li><a href="{{url('admin/cate_list')}}" target="right"><span class="icon-caret-right"></span>商品分类列表</a></li>
    <li><a href="{{url('admin/cate_add')}}" target="right"><span class="icon-caret-right"></span>添加商品分类</a></li>    
  </ul>


  <h2><span class="icon-pencil-square-o"></span>首页轮播图</h2>
  <ul>
    <li><a href="{{url('admin/pic')}}" target="right"><span class="icon-caret-right"></span>添加轮播图</a></li>
    <li><a href="{{url('admin/pic_list')}}" target="right"><span class="icon-caret-right"></span>轮播图列表</a></li>    
  </ul>



	<h2><span class="icon-pencil-square-o"></span>商品模块</h2>
  <ul>
    <li><a href="{{url('admin/goods_add')}}" target="right"><span class="icon-caret-right"></span>添加商品</a></li>
    <li><a href="{{url('admin/goods_list')}}" target="right"><span class="icon-caret-right"></span>商品列表</a></li>    
  </ul>

  <h2><span class="icon-pencil-square-o"></span>订单模块</h2>
  <ul>
    <li><a href="{{url('admin/order_list')}}" target="right"><span class="icon-caret-right"></span>订单列表</a></li>      
  </ul>

  <h2><span class="icon-pencil-square-o"></span>评论管理</h2>
  <ul>
    <li><a href="{{url('admin/comments_list')}}" target="right"><span class="icon-caret-right"></span>评论列表</a></li>
  </ul>

  <h2><span class="icon-pencil-square-o"></span>友情链接</h2>
  <ul>
    <li><a href="{{url('admin/link_list')}}" target="right"><span class="icon-caret-right"></span>友链列表</a></li>
    <li><a href="{{url('admin/link_add')}}" target="right"><span class="icon-caret-right"></span>添加友链</a></li>
  </ul>

  @if($pass == 1)
  <h2><span class="icon-pencil-square-o"></span>管理员模块</h2>
  <ul>
  	<li><a href="{{url('admin/admin_list')}}" target="right"><span class="icon-caret-right"></span>管理员列表</a></li><!-- 
    <li><a href="{{url('admin/admin_edit')}}" target="right"><span class="icon-caret-right"></span>修改密码</a></li> -->
    <!-- <li><a href="{{url('admin/competence')}}" target="right"><span class="icon-caret-right"></span>权限管理</a></li>   -->
  </ul>    
  @endif

</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>

  <li><b>当前用户：</b><span style="color:red;">{{session('username')}}</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- 切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a>  --></li>

</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="{{url('admin/info')}}" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>
