<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
	<title>首页</title>
	@yield('head')
	
	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			@yield('top_nav')
			<!-- end顶部导航条 -->

			<!-- banner -->
			@yield('banner')						
			<!-- end banner -->
			<div class="shopNav">
				<div class="slideall">
			           <!-- 中间导航 -->
					   @yield('mid_nav')
		        		<!-- end 中间导航 -->

						<!--侧边导航 -->
						@yield('left_nav')

					<!--小导航 -->
					@yield('small_nav')

					<!--走马灯 -->
					@yield('right_box')
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->
					@yield('recommend')
					<!-- end 今日推荐 -->
					<!--热门活动 -->
					@yield('hot')
					<!-- end 热门活动 -->
					<!--甜点-->
					@yield('cat_one')
					<!--坚果-->
					@yield('cat_two')
					<!-- 海味 -->
					@yield('cat_tree')
					<!-- 底部 -->
					@yield('footer')
				</div>
			</div>
		</div>
		</div>
		<!--引导 -->
		@yield('inc')
		<!--菜单 -->
		@yield('menu')
	</body>

</html>
