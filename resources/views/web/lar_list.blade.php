@extends('web.lar_list_master')

@section('title','搜索页面')

@section('head')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{asset('style/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('web_style/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('web_style/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('web_style/basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('web_style/css/seastyle.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('web_style/basic/js/jquery-1.7.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web_style/js/script.js')}}"></script>
@endsection

@section('top_nav')
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						<a href="{{url('/goods/id')}}" target="_top" class="h">亲，请登录</a>
						<a href="{{url('/goods/id')}}" target="_top">免费注册</a>
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="{{url('/goods/id')}}" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="{{url('/goods/id')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
					</div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="{{url('/goods/id')}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a>
					</div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="{{url('/goods/id')}}" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a>
				</div>
			</ul>
		</div>

		<!--悬浮搜索框-->

			<div class="nav white">

				<div class="logo">
					<img src="{{asset('web_style/images/logo.png')}}" />
				</div>

				<div class="logoBig">
					<li><img src="{{asset('web_style/images/logobig.png')}}" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="{{url('/goods/id')}}"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn"  value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>
			<div class="clear"></div>
@endsection

@section('mid_nav')
<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span>
					   </div>
					   <div class="nav-cont">
							<!-- <ul>
								<li class="index"><a href="">首页</a></li>
								@if($midtype)
									@foreach($midtype as $val)
                                		<li class="qc"><a href="/list/{{$val['id']}}">{{$val['name']}}</a></li>
                                	@endforeach
                                @endif
                                
							</ul> -->
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
@endsection

@section('search_keyword')
<!-- <div class="searchAbout">
	<span class="font-pale">相关搜索：</span>
	<a title="坚果" href="{{url('/goods/id')}}">坚果</a>
	<a title="瓜子" href="{{url('/goods/id')}}">瓜子</a>
	<a title="鸡腿" href="{{url('/goods/id')}}">豆干</a>
</div> -->
@endsection

@section('select')
<!-- <ul class="select">
	<p class="title font-normal">
		<span class="fl">松子</span>
		<span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span>
	</p>

	<div class="clear"></div>

	<li class="select-result">
		<dl>
			<dt>已选</dt>
			<dd class="select-no"></dd>
			<p class="eliminateCriteria">清除</p>
		</dl>
	</li>

	<div class="clear">
	</div>

	<li class="select-list">
		<dl id="select1">
			<dt class="am-badge am-round">品牌</dt>	
		
			 <div class="dd-conent">										
				<dd class="select-all selected"><a href="{{url('/goods/id')}}">全部</a></dd>
				<dd><a href="{{url('/goods/id')}}">百草味</a></dd>
				<dd><a href="{{url('/goods/id')}}">良品铺子</a></dd>
				<dd><a href="{{url('/goods/id')}}">新农哥</a></dd>
				<dd><a href="{{url('/goods/id')}}">楼兰蜜语</a></dd>
				<dd><a href="{{url('/goods/id')}}">口水娃</a></dd>
				<dd><a href="{{url('/goods/id')}}">考拉兄弟</a></dd>
			 </div>

		</dl>
	</li>

	<li class="select-list">
		<dl id="select2">
			<dt class="am-badge am-round">种类</dt>
			<div class="dd-conent">
				<dd class="select-all selected"><a href="{{url('/goods/id')}}">全部</a></dd>
				<dd><a href="{{url('/goods/id')}}">东北松子</a></dd>
				<dd><a href="{{url('/goods/id')}}">巴西松子</a></dd>
				<dd><a href="{{url('/goods/id')}}">夏威夷果</a></dd>
				<dd><a href="{{url('/goods/id')}}">松子</a></dd>
			</div>
		</dl>
	</li>

	<li class="select-list">
		<dl id="select3">
			<dt class="am-badge am-round">选购热点</dt>
			<div class="dd-conent">
				<dd class="select-all selected"><a href="{{url('/goods/id')}}">全部</a></dd>
				<dd><a href="{{url('/goods/id')}}">手剥松子</a></dd>
				<dd><a href="{{url('/goods/id')}}">薄壳松子</a></dd>
				<dd><a href="{{url('/goods/id')}}">进口零食</a></dd>
				<dd><a href="{{url('/goods/id')}}">有机零食</a></dd>
			</div>
		</dl>
	</li>
</ul>
<div class="clear"></div> -->
@endsection

@section('sort')
<div class="sort">
<!-- <li class="first"><a title="综合">综合排序</a></li>
<li><a title="销量">销量排序</a></li>
<li><a title="价格">价格优先</a></li>
<li class="big"><a title="评价" href="{{url('/goods/id')}}">评价为主</a></li> -->
</div>
<div class="clear"></div>
@endsection

@section('goods_list')
<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
								@foreach($goodslist as $val)
									<li>
										<div class="i-pic limit">
											@if($val['cover_img'])
												<a href="{{url('./goods')}}/{{$val['goods_id']}}"><img width="218" height="218" src="../../{{$val['cover_img']}}" /></a>
											@else
												<img width="218" height="218" src="{{asset('style/images/image.png')}}" />
											@endif
											<p class="title fl">
												{{mb_substr($val['goods_name'],0,30)}}
											</p>

											<p class="price fl">
												<b>¥</b>
												<strong>{{$val['shop_price']}}</strong>
											</p>
											<p class="number fl">
												销量<span>{{$val['sales_num']}}</span>
											</p>
										</div>
									</li>
								@endforeach		
								</ul>
@endsection

@section('goods_list_right')
<div class="side-title">
	经典搭配
</div>

<li>
	<div class="i-pic check">
		<img src="{{asset('web_style/images/cp.jpg')}}" />

		<p class="check-title">萨拉米 1+1小鸡腿</p>
		<p class="price fl">
			<b>¥</b>
			<strong>29.90</strong>
		</p>
		<p class="number fl">
			销量<span>1110</span>
		</p>
	</div>
</li>

<li>
	<div class="i-pic check">
		<img src="{{asset('web_style/images/cp2.jpg')}}" />

		<p class="check-title">ZEK 原味海苔</p>
		<p class="price fl">
			<b>¥</b>
			<strong>8.90</strong>
		</p>
		<p class="number fl">
			销量<span>1110</span>
		</p>
	</div>
</li>

<li>
	<div class="i-pic check">
		<img src="{{asset('web_style/images/cp.jpg')}}" />
		<p class="check-title">萨拉米 1+1小鸡腿</p>
		<p class="price fl">
			<b>¥</b>
			<strong>29.90</strong>
		</p>
		<p class="number fl">
			销量<span>1110</span>
		</p>
	</div>
</li>
@endsection
