@extends("web.lar_cat_list_master")

@section('title','全部分类')

@section('head')
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">			

	<link href="{{asset('web_style/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('web_style/basic/css/demo.css')}}" rel="stylesheet" type="text/css" />		
	<link href="{{asset('web_style/css/sortstyle.css')}}" rel="stylesheet" type="text/css" />
	<script src="{{asset('web_style/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
@endsection

@section('top_nav')
<div class="am-container header">
	<ul class="message-l">
		<div class="topMessage">
			<div class="menu-hd">
				<a href="#" target="_top" class="h">亲，请登录</a>
				<a href="#" target="_top">免费注册</a>
			</div>
		</div>
	</ul>
	<ul class="message-r">
		<div class="topMessage home">
			<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
		</div>
		<div class="topMessage my-shangcheng">
			<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
		</div>
		<div class="topMessage mini-cart">
			<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
		</div>
		<div class="topMessage favorite">
			<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
	</ul>
	</div>

	<!--悬浮搜索框-->

	<div class="nav white">
		<div class="logo"><img src="{{asset('web_style/images/logo.png')}}" /></div>
		<div class="logoBig">
			<li><img src="{{asset('web_style/images/logobig.png')}}" /></li>
		</div>

		<div class="search-bar pr">
			<a name="index_none_header_sysc" href="#"></a>
			<form>
				<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
				<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
			</form>
		</div>
	</div>

	<div class="clear"></div>
</div>		
@endsection

@section('cat_li')
	@if($typelist)
		@foreach($typelist as $value)
		<li <?php echo $value['id']==$pid? "class='appliance js_toggle relative selected'":"class='appliance js_toggle relative'" ?> ><!-- first selectd -->
			<div class="category-info">
				<h3 class="category-name b-category-name"><i><img src="{{asset('web_style/images/cake.png')}}"></i><a class="ml-22" title="{{$value['name']}}">{{$value['name']}}</a></h3>
				<em>&gt;</em>
			</div>
					<div class="menu-item menu-in top">
						<div class="area-in">
							<div class="area-bg">
								<div class="menu-srot">	
									<!-- <div class="brand-side">
						              <dl class="dl-sort"><dt><span>为您推荐</span></dt>
						                <img src="{{asset('web_style/images/TJ.jpg')}}">
						              </dl>
					                </div>		 -->           
<div class="sort-side">
<script type="text/javascript">
		$(document).ready(function() {
		$("li").click(function() {		
		     	$(this).addClass("selected").siblings().removeClass("selected");
	       })
		})
		</script>
		<div class="clear"></div>

@if($value['child'])
	@foreach($value['child'] as $val)
		<dl class="dl-sort">
		<dt><span title="{{$val['name']}}">{{$val['name']}}</span></dt>
			@if($val['son'])
				@foreach($val['son'] as $v)
					<dd><a title="{{$v['name']}}" href="list/{{$v['id']}}"><span>{{$v['name']}}</span></a></dd>
				@endforeach
			@endif	
		</dl>
	@endforeach
@endif	
</div>
								</div>
							</div>
						</div>
					</div>
			<b class="arrow"></b>	
		</li>
		@endforeach
	@endif
@endsection
