/*--------------------------------------------------购物车-------------------------------------------------------------*/

//全选
/*function checkAll() {

	//给全选按钮绑定点击事件
	$("input[name='checkall']").on("click", function() {

		//获取当前商品选择框是否已选
		var bool = $("input[name='check[]']").prop('checked');

		//判断只要商品框有一个没选的时候点击全选按钮就全选所有商品
		if(bool == false) {

			//全选所有商品
			$("input[name='check[]']").prop('checked', true);
			var shop_price = document.getElementsByClassName('order-price');
			var sprice = 0;
			for(var i =0; i<shop_price.length; i++) {

				sprice = sprice + parseFloat(shop_price[i].innerHTML);
			}
			$(".total").html(sprice.toFixed(2));
			$(".num").html(shop_price.length);
		} else {

			//如果已经全选了商品的时候点击全选按钮则把所有商品变为未选,并把全选按钮也变为未选
			$("input[name='check[]']").prop('checked', false);
			$("input[name='checkall']").prop('checked', false);
			$(".total").html("0.00");
			$(".num").html("0");
		}

	});

	var price_shop = 0;
	//给商品选择按钮绑定点击事件
	$("input[name='check[]']").on("click", function() {

		var that = $(this);

		var total_price = parseFloat(that.parent().next().next().next().next().next().html());

		var total = parseFloat($(".total").html());

		var gnum = parseInt($(".num").html());

		//点击任意一个商品选择按钮则判断当前商品按钮是否为未选状态，是则把全选按钮变为未选
		$(this).each( function() {

			//当前按钮状态
			var bool = $(this).prop('checked');

			$(".total").html((total + total_price).toFixed(2));

			$(".num").html(gnum+1);

			//未选状态
			if(bool == false) {

				//把全选按钮变为未选
				$("input[name='checkall']").prop('checked', false);

				$(".total").html((total - total_price).toFixed(2));

				$(".num").html(gnum-1);
			}
		});
		
		
	});

}*/

//购买数量及单项商品总计
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

		val = $(this).val();
		
		//获取商品价格
		var price = $(this).parent().prev().html();

		//四舍五入保留两位小数
		var sum = (Math.round((val * price) *100)/100).toFixed(2);

		//赋值给单项商品总计
		$(this).parent().next().html(sum);

		total();

	});

	//点击加号加1
	$(".add").on("click", function() {

		//获取当前的数量
		var num = $(this).prev("input").val();
		
		//加1
		num++;

		//把最新的赋值给购买数量输入框
		$(this).prev("input").val(num);

		//获取最新的数量
		var num = $(this).prev("input").val();

		//获取商品价格
		var price = $(this).parent().prev().html();

		//四舍五入保留两位小数
		var sum = (Math.round((num * price) *100)/100).toFixed(2);

		//赋值给单项商品总计
		$(this).parent().next().html(sum);

		total();

	});

	//点击减号减1
	$(".min").on("click", function() {

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

		//获取最新的数量
		var num = $(this).next('input').val();

		//获取商品价格
		var price = $(this).parent().prev().html();

		//四舍五入保留两位小数
		var sum = (Math.round((num * price) *100)/100).toFixed(2)

		//赋值给单项商品总计
		$(this).parent().next().html(sum);

		total();

	});
}



//购买按纽点击事件
$("button[name='shoping']").on("click", function() {
	window.location.href = window.location.protocol+"//"+window.location.host;
});

//结算按纽点击事件
$("button[name='pay']").on("click", function() {

	var img = document.getElementsByClassName("order-img");

	var arr = [];

	for(var i =0; i<img.length; i++) {

		var pic = $(img[i]).find("img").attr("src");

		var shopname = $(img[i]).next().html();

		var shopprice = $(img[i]).next().next().html();

		var shopnum = $(img[i]).next().next().next().find("input[name='good-num']").val();

		var arrData = [{
			cover_img:pic,
			goods_name:shopname,
			shop_price:shopprice,
			goodnum:shopnum
		}];

		Array.prototype.push.apply(arr, arrData);
	}

	$.ajax({

		type:"get",
		url:window.location.protocol+"//"+window.location.host+"/cartSession",
		data:{
			"shopData":arr
		},

		success:function(data) {
			
			if(data == 1) {
				window.location.href = window.location.protocol+"//"+window.location.host+"/pay";
			}
		}
	});
});

//删除按纽点击事件

var gname = document.getElementsByName("delete");

for(var i  = 0; i<gname.length; i++) {

	gname[i].onclick =  function() {

		var that = $(this);

		$.ajax({

			type:"get",
			url:window.location.protocol+"//"+window.location.host+"/cartDelete",
			data:{id:$(this).attr('val')},
			success:function(data) {
				
				if(data > 0) {
					that.parent().parent().remove();
				}
			}
		});
	};
}


//商品总计
function total() {

	var sumprice = document.getElementsByClassName("order-price");

	var sumtotal = 0;

	for(var i = 0; i < sumprice.length; i++) {

		sumtotal = parseFloat(sumtotal) + parseFloat($(sumprice[i]).html());
		
		
	}

	$(".total").html(sumtotal.toFixed(2));
}




//全选
// checkAll();

//购买数量
goodNum();

//商品总计
total()
