
/*--------------------------------------------------商品详情-------------------------------------------------------------*/

//放大境
function zoom() {
	//获取需要放大的商品图片
	var small  = document.getElementById('small');

	//放大的图片
	var big  = document.getElementById('big');

	small.onmousemove = function (ev) {

			//此处是为了兼容多种浏览器
			var e = ev || event;

			//进来就显示
			$(big).css({display:"block"});

			//改变鼠标样式
			$(small).css({cursor:"move"});

			//拿到鼠标XY轴的值
			var offX = e.offsetX;
		 	var offY = e.offsetY;

		 	//根据小图的相对位置，改变大图的滚动条距离
			big.scrollLeft = offX*2-200;
			big.scrollTop = offY*2-200;

	}

	//鼠标移出时隐藏
	small.onmouseout = function () {

		$(big).css({display:"none"});
	}

}

//移动到小图改变大图和放大境的src
function smallpic(){

	//商品大图下面的小图
	$('.good-small li img').on("mouseover", function(){

		//移入图片的src地址
		var src = $(this).attr("src");

		//商品大图
		$("#small").attr({src:src});

		//放大境
		$("#big img").attr({src:src});

	});

}

//购买数量
function goodNum(){

	//手动输入数量的时候防止用户输入非法值
	$('input[name="good-num"]').keyup( function() {

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

	});

	//点击加号加1
	$("#add").on("click", function() {

		//获取当前的数量
		var num = $(this).prev("input").val();
		
		//加1
		num++;

		//把最新的赋值给购买数量输入框
		$(this).prev("input").val(num);

	});

	//点击减号减1
	$("#minus").on("click", function() {

		//获取当前的数量
		var num = $(this).next('input').val();
		
		//判断大于1是为了防止用户直接输入小于1的数量
		if(num > 1) {

			num--;

		} else {

			//如果小于1则单项商品总计的值变为1
			$(this).next('input').val(1);
		}

		//把最新的赋值给购买数量输入框
		$(this).next('input').val(num);


	});
}

//放大境
zoom();

//移动到小图改变大图和放大境的src
smallpic();

//购买数量
goodNum();
