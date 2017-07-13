// JavaScript Document

//商品规格选择
$(function() {
	$(".theme-options").each(function() {
		var i = $(this);
		var p = i.find("ul>li");
		p.click(function() {
			if (!!$(this).hasClass("selected")) {
				$(this).removeClass("selected");

			} else {
				$(this).addClass("selected").siblings("li").removeClass("selected");

			}

		})
	})

})


//弹出规格选择
$(document).ready(function() {
	var $ww = $(window).width();
	if ($ww <1025) {
		$('.theme-login').click(function() {
			$(document.body).css("position", "fixed");
			$('.theme-popover-mask').show();
			$('.theme-popover').slideDown(200);

		})

		$('.theme-poptit .close,.btn-op .close').click(function() {
			$(document.body).css("position", "static");
			//					滚动条复位
			$('.theme-signin-left').scrollTop(0);

			$('.theme-popover-mask').hide();
			$('.theme-popover').slideUp(200);
		})

	}
})

//导航固定
$(document).ready(function() {
	var $ww = $(window).width();
	var dv = $('ul.am-tabs-nav.am-nav.am-nav-tabs'),
		st;

	if ($ww < 623) {

				var tp =$ww+363;
				$(window).scroll(function() {
					st = Math.max(document.body.scrollTop || document.documentElement.scrollTop);
					if (st >= tp) {
						if (dv.css('position') != 'fixed') dv.css({
							'position': 'fixed',
							top: 53,
							'z-index': 1000009
						});

					} else if (dv.css('position') != 'static') dv.css({
						'position': 'static'
					});
				});
				//滚动条复位（需要减去固定导航的高度）

				$('.introduceMain ul li').click(function() {
					sts = tp;
					$(document).scrollTop(sts);
				});
       } else {

		dv.attr('otop', dv.offset().top); //存储原来的距离顶部的距离
		var tp = parseInt(dv.attr('otop'))+36;
		$(window).scroll(function() {
			st = Math.max(document.body.scrollTop || document.documentElement.scrollTop);
			if (st >= tp) {
             
					if (dv.css('position') != 'fixed') dv.css({
						'position': 'fixed',
						top: 0,
						'z-index': 998
					});

				//滚动条复位	
				$('.introduceMain ul li').click(function() {
					sts = tp-35;
					$(document).scrollTop(sts);
				});

			} else if (dv.css('position') != 'static') dv.css({
				'position': 'static'
			});
		});



	}
});



$(document).ready(function() {
	//优惠券
	$(".hot span").click(function() {
		$(".shopPromotion.gold .coupon").toggle();
	})




	//手动输入数量的时候防止用户输入非法值
	$('#text_box').keyup( function() {

		//当前的值
		var val = $(this).val();

		//不为空
		if(val != "") {

			//不为数字
			if(isNaN(val)){

				$(this).val(1);

			} else if(val < 1){ //小于1

				$(this).val(1);
			}
		} else { //为空

			$(this).val(1);
		}

		val = $(this).val();
		

	});

	//点击加号加1
	$("#add").on("click", function() {

		//获取当前的数量
		var num = $('#text_box').val();
		
		//加1
		num++;

		//把最新的赋值给购买数量输入框
		$('#text_box').val(num);

	
	});

	//点击减号减1
	$("#min").on("click", function() {

		//获取当前的数量
		var num = $('#text_box').val();
		
		//判断大于1是为了防止用户直接输入小于1的数量
		if(num > 1) {

			num--;

		} else {

			//如果小于1则单项商品总计的值变为1
			$('#text_box').val(1);
		}

		//把最新的赋值给购买数量输入框
		$('#text_box').val(num);

		

	});

})
