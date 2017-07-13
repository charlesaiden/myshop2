@extends("web.lar_index_master")

@section("head")
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link href="web_style/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
	<link href="web_style/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

	<link href="web_style/basic/css/demo.css" rel="stylesheet" type="text/css" />

	<link href="web_style/css/hmstyle.css" rel="stylesheet" type="text/css" />
	<script src="web_style/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
	<script src="web_style/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
@endsection

<!-- 顶部导航 -->
@section("top_nav")
<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							@if(isset($username))
								欢迎您:{{$username}}
								<a href="{{url('quit')}}">退出</a>
							@else
								<a href="{{url('login')}}" target="_top" class="h">亲，请登录</a>
								<a href="{{url('register')}}" target="_top">免费注册</a>
							@endif

						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="{{url('index')}}" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="{{url('center')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="{{url('cart')}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
					</div>

				</ul>
				</div>

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logo"><img src="web_style/images/logo.png" /></div>
					<div class="logoBig">
						<li><img src="web_style/images/logobig.png" /></li>
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

<!-- banner -->
@section('banner')
<div class="banner">
<!--轮播 -->
<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
	<ul class="am-slides">
		@if($banner)
			@foreach($banner as $val)
				<li class="banner1"><a><img src="./upload/{{$val}}" /></a></li>
			@endforeach
		@endif
	</ul>
</div>
<div class="clear"></div>	
</div>

<!--轮播 -->
<script type="text/javascript">
	(function() {
		$('.am-slider').flexslider();
	});
	$(document).ready(function() {
		$("li").hover(function() {
			$(".category-content .category-list li.first .menu-in").css("display", "none");
			$(".category-content .category-list li.first").removeClass("hover");
			$(this).addClass("hover");
			$(this).children("div.menu-in").css("display", "block")
		}, function() {
			$(this).removeClass("hover")
			$(this).children("div.menu-in").css("display", "none")
		});
	})
</script>
@endsection

<!-- 中部导航 -->
@section('mid_nav')
<div class="long-title">
	<span class="all-goods">全部分类</span>
</div>
<div class="nav-cont">
	<ul>
		<li class=""><a href="#">首页</a></li>
		@if($midtype)
			@foreach($midtype as $val)
				<li class="qc"><a href="cat_list/{{$val['id']}}">{{$val['name']}}</a></li>
			@endforeach

		@endif
		
	</ul>
	<div class="nav-extra">
		<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
		<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
	</div>
</div>
@endsection


@section('left_nav')
<div id="nav" class="navfull">
	<div class="area clearfix">
	<div class="category-content" id="guide_2">
		
		<div class="category">
			<ul class="category-list" id="js_climit_li">
				@foreach($typelist as $key=>$value)
				<li class="appliance js_toggle relative first">
					<div class="category-info">
						<h3 class="category-name b-category-name"><i><img src="web_style/images/cake.png"></i><a class="ml-22" title="<?php echo $value['name'] ?>">{{$value['name']}}</a></h3>
						<em>&gt;</em>
					</div>
					<div class="menu-item menu-in top">
						<div class="area-in">
							<div class="area-bg">
								<div class="menu-srot">
									<div class="sort-side">
										@foreach($value['child'] as $val)
										<dl class="dl-sort">
											<dt>
												<a href="cat_list/{{$val['id']}}">
												<span title="{{$val['name']}}">{{$val['name']}}
												</span>
												</a>
											</dt>
											@foreach($val['son'] as $v)
											<dd><a title="{{$v['name']}}" href="cat_list/list/{{$v['id']}}"><span>{{$v['name']}}</span></a></dd>
											@endforeach
										</dl>
										@endforeach
									</div>
									
								</div>
							</div>
						</div>
					</div>
				<b class="arrow"></b>	
				</li>
				@endforeach
			</ul>
		</div>
	</div>

	</div>
</div>
@endsection

@section('right_box')
<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="web_style/images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="web_style/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="web_style/person/index.html">
									<img src="web_style/images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">小叮当</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="login">登录</a>
								<a class="am-btn-warning btn" href="register">注册</a>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="web_styleimages/advTip.jpg"/></div>
						</div>
</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
@endsection


@section('recommend')
<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3">
							<img src="web_style/images/2016.png"></img>
							<p>今日<br>推荐</p>
						</div>
						@if($recommend)
							@foreach($recommend as $val)
							<a href="/goods/{{$val['goods_id']}}">
							<div class="am-u-sm-4 am-u-lg-3 ">
								<div class="info ">
									<h3>{{$val['goods_name']}}</h3>
									<h4>{!! $val['goods_remake'] !!}</h4>
								</div>
								<div class="recommendationMain ">
									<img src="../{{$val['cover_img']}}"></img>
								</div>
							</div>
							</a>
							@endforeach						
						@endif
</div>
<div class="clear "></div>
@endsection


@section('hot')
<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<!-- <span class="more ">
                              <a class="more-link " href="">全部活动</a>
                            </span> -->
						</div>
					
					  <div class="am-g am-g-fixed ">
					    @if($hot)
						  	@foreach($hot as $val)
						  		<a href="goods/{{$val['goods_id']}}">
								<div class="am-u-sm-3 ">
									<div class="icon-sale tree "></div>	
										<h4>秒杀</h4>							
									<div class="activityMain ">
										<img width="296" height="314.02" src="../{{$val['cover_img']}}"></img>
									</div>
									<div class="info ">
										<h3>{{$val['goods_name']}}</h3>
									</div>														
								</div>
							@endforeach
						@endif
						
					  </div>
</div>
<div class="clear "></div>
@endsection

@section('cat_one')
	<div class="am-container ">
		<div class="shopTitle ">
			<h4>{{$candylist['name']}}</h4>
			<h3>每一道甜品都有一个故事</h3>
			
			<div class="today-brands ">
				@foreach($candylist['child'] as $val)
				<a href="javascript:;">{{$val['name']}}</a>
				@endforeach
			</div>

			<span class="more">
    		<a class="more-link " href="cat_list/{{$candylist['id']}}">更多美味</a>
        </span>
		</div>
	</div>
	
	<div class="am-g am-g-fixed floodOne ">
		<div class="am-u-sm-5 am-u-md-3 am-u-lg-4 text-one ">
			@if($candylist['one'])	
					<a href="goods/{{$candylist['one']['goods_id']}}">
						<div class="outer-con ">
							<div class="title ">
								{{$candylist['one']['goods_name']}}
							</div>					
							<div class="sub-title ">
								{!! $candylist['one']['goods_remake'] !!}
							</div>
						</div>
		                  <img src="../{{$candylist['one']['cover_img']}}" />
					</a>
			@endif
		</div>

		<div class="am-u-sm-7 am-u-md-5 am-u-lg-4">
			@if($candylist['two'])
				@foreach($candylist['two'] as $val)
					<a href="goods/{{$val['goods_id']}}">
					<div class="text-two">
						<div class="outer-con ">
							<div class="title ">
								{{$val['goods_name']}}
							</div>									
							<div class="sub-title ">
								仅售：¥{{$val['shop_price']}}
							</div>
							
						</div>
						<a href="goods/{{$val['goods_id']}}"><img src="../{{$val['cover_img']}}" /></a>
					</div>
					</a>
				@endforeach
			@endif
		</div>
     <div class="am-u-sm-12 am-u-md-4 ">
     	@if($candylist['four'])
     		@foreach($candylist['four'] as $val)
     			<a href="goods/{{$val['goods_id']}}">
				<div class="am-u-sm-3 am-u-md-6 text-three">
					<div class="outer-con ">
						<div class="title ">
							{{$val['goods_name']}}
						</div>
						
						<div class="sub-title ">
							尝鲜价：¥{{$val['shop_price']}}
						</div>
					</div>
					<a href="goods/{{$val['goods_id']}}"><img src="../{{$val['cover_img']}}" /></a>
				</div>
				</a>
			@endforeach
		@endif
		<!-- <div class="am-u-sm-3 am-u-md-6 text-three">
			<div class="outer-con ">
				<div class="title ">
					小优布丁
				</div>
				
				<div class="sub-title ">
					尝鲜价：¥4.8
				</div>
			</div>
			<a href="# "><img src="web_style/images/act3.png " /></a>
		</div>

		<div class="am-u-sm-3 am-u-md-6 text-three">
			<div class="outer-con ">
				<div class="title ">
					小优布丁
				</div>
				
				<div class="sub-title ">
					尝鲜价：¥4.8
				</div>
			</div>
			<a href="# "><img src="web_style/images/act3.png " /></a>
		</div>

		<div class="am-u-sm-3 am-u-md-6 text-three last ">
			<div class="outer-con ">
				<div class="title ">
					小优布丁
				</div>
				
				<div class="sub-title ">
					尝鲜价：¥4.8
				</div>
			</div>
			<a href="# "><img src="web_style/images/act3.png " /></a>
		</div> -->
	</div>

	</div>
 <div class="clear "></div>
@endsection

@section('cat_two')
<div class="am-container ">
	<div class="shopTitle ">
		<h4>{{$pufflist['name']}}</h4>
		<h3>酥酥脆脆，回味无穷</h3>
		<div class="today-brands ">
			@if($pufflist['child'])
				@foreach($pufflist['child'] as $val)
				<a href="javascript:;">{{$val['name']}}</a>
				@endforeach
			@endif
		</div>
		<span class="more ">
<a class="more-link " href="cat_list/{{$pufflist['id']}}">更多美味</a>
    </span>
	</div>
</div>
<div class="am-g am-g-fixed floodTwo ">
	
	
	<div class="am-u-sm-5 am-u-md-4 text-one ">
		@if($pufflist['one'])
		<a href="goods/{{$pufflist['one']['goods_id']}}">
			<img src="../{{$pufflist['one']['cover_img']}}" />
			<div class="outer-con ">
				<div class="title ">
					{{$pufflist['one']['goods_name']}}
				</div>
				<div class="sub-title ">
					{!! $pufflist['one']['goods_remake'] !!}
				</div>
				
			</div>
		</a>
		@endif
	</div>
	
	@if($pufflist['four'])
		@foreach($pufflist['four'] as $val)
		<div class="am-u-sm-7 am-u-md-4 am-u-lg-2 text-two">
			<div class="outer-con ">
				<div class="title ">
					{{$val['goods_name']}}
				</div>
				
				<div class="sub-title ">
					仅售：¥{{$val['shop_price']}}
				</div>
			</div>
			<a href="# "><img src="../{{$val['cover_img']}}" /></a>	
		</div>
		@endforeach
	@endif
	<!-- <div class="am-u-md-4 am-u-lg-2 text-three">
		<div class="outer-con ">
			<div class="title ">
				小优布丁@@
			</div>
			
			<div class="sub-title ">
				尝鲜价：¥4.8
			</div>
		</div>
		<a href="# "><img src="web_style/images/act3.png " /></a>
	</div>
	<div class="am-u-md-4 am-u-lg-2 text-three">
		<div class="outer-con ">
			<div class="title ">
				小优布丁
			</div>
			
			<div class="sub-title ">
				尝鲜价：¥4.8
			</div>
		</div>
		<a href="# "><img src="web_style/images/act3.png " /></a>
	</div>
	<div class="am-u-sm-6 am-u-md-4 am-u-lg-2 text-two ">
			<div class="outer-con ">
				<div class="title ">
					雪之恋和风大福
				</div>
				
				<div class="sub-title ">
					仅售：¥13.8
				</div>
			</div>
			<a href="# "><img src="web_style/images/5.jpg " /></a>						
	</div> -->
	@if($pufflist['two'])
		@foreach($pufflist['two'] as $val)
		<div class="am-u-sm-6 am-u-md-3 am-u-lg-2 text-four ">
				<div class="outer-con ">
					<div class="title ">
						{{$val['goods_name']}}
					</div>
					
					<div class="sub-title ">
						仅售：¥{{$val['shop_price']}}
					</div>
				</div>
				<a href="# "><img src="../{{$val['cover_img']}}" /></a>	
		</div>
		@endforeach
	@endif

	@if($pufflist['two'])
		@foreach($pufflist['two'] as $val)
			<div class="am-u-sm-4 am-u-md-3 am-u-lg-4 text-five">
				<div class="outer-con ">
					<div class="title ">
						{{$val['goods_name']}}
					</div>								
					<div class="sub-title ">
						尝鲜价：{{$val['shop_price']}}
					</div>
					
				</div>
				<a href="goods/{{$val['goods_id']}}"><img src="../{{$val['cover_img']}}" /></a>
			</div>
		@endforeach
	@endif

	<!-- <div class="am-u-sm-4 am-u-md-3 am-u-lg-2 text-six">
		<div class="outer-con ">
			<div class="title ">
				小优布丁
			</div>
			
			<div class="sub-title ">
				尝鲜价：¥4.8
			</div>
		</div>
		<a href="# "><img src="web_style/images/act3.png " /></a>
	</div>	
	<div class="am-u-sm-4 am-u-md-3 am-u-lg-4 text-five">
		<div class="outer-con ">
			<div class="title ">
				小优布丁
			</div>
			<div class="sub-title ">
				尝鲜价：¥4.8
			</div>
			
		</div>
		<a href="# "><img src="web_style/images/act2.png " /></a>
	</div>	 -->

</div>

<div class="clear "></div>
@endsection

@section('cat_tree')
<div class="am-container ">
	<div class="shopTitle ">
		<h4>{{$meatlist['name']}}</h4>
		<h3>你是我的优乐美么？不，我是你小鱼干</h3>
		<div class="today-brands ">
			@if($meatlist['child'])
				@foreach($meatlist['child'] as $val)
					<a href="javascript:;">{{$val['name']}}</a>
				@endforeach
			@endif
		</div>
		<span class="more ">
<a class="more-link " href="cat_list/{{$meatlist['id']}}">更多美味</a>
    </span>
	</div>
</div>
<div class="am-g am-g-fixed flood method3 ">
	<ul class="am-thumbnails ">
		@if($meatlist['list'])
			@foreach($meatlist['list'] as $val)
				<li>
					<div class="list ">
						<a href="goods/{{$val['goods_id']}}">
							<img width="188" height="188" src="../{{$val['cover_img']}}" />
							<div class="pro-title ">{{$val['goods_name']}}</div>
							<span class="e-price">￥{{$val['shop_price']}}</span>
						</a>
					</div>
				</li>
			@endforeach
		@endif

	<!-- 	<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp2.jpg " />
					<div class="pro-title ">ZEK 原味海苔</div>
					<span class="e-price ">￥8.90</span>
				</a>
			</div>
		</li>
		<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp.jpg " />
					<div class="pro-title ">萨拉米 1+1小鸡腿</div>
					<span class="e-price ">￥29.90</span>
				</a>
			</div>
		</li>
		<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp2.jpg " />
					<div class="pro-title ">ZEK 原味海苔</div>
					<span class="e-price ">￥8.90</span>
				</a>
			</div>
		</li>
		<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp.jpg " />
					<div class="pro-title ">萨拉米 1+1小鸡腿</div>
					<span class="e-price ">￥29.90</span>
				</a>
			</div>
		</li>
		<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp2.jpg " />
					<div class="pro-title ">ZEK 原味海苔</div>
					<span class="e-price ">￥8.90</span>
				</a>
			</div>
		</li>
		<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp.jpg " />
					<div class="pro-title ">萨拉米 1+1小鸡腿</div>
					<span class="e-price ">￥29.90</span>
				</a>
			</div>
		</li>
		<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp2.jpg " />
					<div class="pro-title ">ZEK 原味海苔</div>
					<span class="e-price ">￥8.90</span>
				</a>
			</div>
		</li>
		<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp.jpg " />
					<div class="pro-title ">萨拉米 1+1小鸡腿</div>
					<span class="e-price ">￥29.90</span>
				</a>
			</div>
		</li>
		<li>
			<div class="list ">
				<a href="# ">
					<img src="web_style/images/cp2.jpg " />
					<div class="pro-title ">ZEK 原味海苔</div>
					<span class="e-price ">￥8.90</span>
				</a>
			</div>
		</li> -->

	</ul>
</div>
@endsection

@section('footer')
<div class="footer ">
	<div class="footer-hd ">
		<p>
			<a href="">葫芦娃组</a>
			<b>|</b>
			<a href="">商城首页</a>
			<b>|</b>
			<a href="">支付宝</a>
			<b>|</b>
			<a href="">物流</a>
		</p>
	</div>
	<div class="footer-bd ">
		<p>
			<a href="# ">葫芦娃组</a>
			<a href="# ">合作伙伴</a>
			<a href="# ">联系我们</a>
			<a href="# ">网站地图</a>
			<!-- <em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em> -->
		</p>
	</div>
</div>
@endsection

@section('inc')
<div class="navCir">
	<li class="active"><a href="home3.html"><i class="am-icon-home "></i>首页</a></li>
	<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
	<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
	<li><a href="web_style/person/index.html"><i class="am-icon-user"></i>我的</a></li>					
</div>
@endsection

@section('menu')
<div class=tip>
			<div id="sidebar">
				<div id="wrap">
					<div id="prof" class="item ">
						<a href="# ">
							<span class="setting "></span>
						</a>
						<div class="ibar_login_box status_login ">
							<div class="avatar_box ">
								<p class="avatar_imgbox "><img src="web_style/images/no-img_mid_.jpg " /></p>
								<ul class="user_info ">
									<li>用户名：sl1903</li>
									<li>级&nbsp;别：普通会员</li>
								</ul>
							</div>
							<div class="login_btnbox ">
								<a href="# " class="login_order ">我的订单</a>
								<a href="# " class="login_favorite ">我的收藏</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>

					</div>
					<div id="shopCart " class="item ">
						<a href="# ">
							<span class="message "></span>
						</a>
						<p>
							购物车
						</p>
						<p class="cart_num ">0</p>
					</div>
					<div id="asset " class="item ">
						<a href="# ">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip ">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="foot " class="item ">
						<a href="# ">
							<span class="zuji "></span>
						</a>
						<div class="mp_tooltip ">
							我的足迹
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="brand " class="item ">
						<a href="#">
							<span class="wdsc "><img src="web_style/images/wdsc.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="broadcast " class="item ">
						<a href="# ">
							<span class="chongzhi "><img src="web_style/images/chongzhi.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我要充值
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div class="quick_toggle ">
						<li class="qtitem ">
							<a href="# "><span class="kfzx "></span></a>
							<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
						</li>
						<!--二维码 -->
						<li class="qtitem ">
							<a href="#none "><span class="mpbtn_qrcode "></span></a>
							<div class="mp_qrcode " style="display:none; "><img src="web_style/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
						</li>
						<li class="qtitem ">
							<a href="#top " class="return_top "><span class="top "></span></a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
			<div id="prof-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					我
				</div>
			</div>
			<div id="shopCart-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					购物车
				</div>
			</div>
			<div id="asset-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					资产
				</div>

				<div class="ia-head-list ">
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">优惠券</div>
					</a>
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">红包</div>
					</a>
					<a href="# " target="_blank " class="pl money ">
						<div class="num ">￥0</div>
						<div class="text ">余额</div>
					</a>
				</div>

			</div>
			<div id="foot-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					足迹
				</div>
			</div>
			<div id="brand-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					收藏
				</div>
			</div>
			<div id="broadcast-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					充值
				</div>
			</div>
</div>
<script>
	window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
</script>
<script type="text/javascript " src="../basic/js/quick_links.js "></script>
@endsection


@section('small_nav')
<div class="am-g am-g-fixed smallnav">
	<div class="am-u-sm-3">
		<a href="sort.html"><img src="web_style/images/navsmall.jpg" />
			<div class="title">商品分类</div>
		</a>
	</div>
	<div class="am-u-sm-3">
		<a href="#"><img src="web_style/images/huismall.jpg" />
			<div class="title">大聚惠</div>
		</a>
	</div>
	<div class="am-u-sm-3">
		<a href="#"><img src="web_style/images/mansmall.jpg" />
			<div class="title">个人中心</div>
		</a>
	</div>
	<div class="am-u-sm-3">
		<a href="#"><img src="web_style/images/moneysmall.jpg" />
			<div class="title">投资理财</div>
		</a>
	</div>
</div>
@endsection
