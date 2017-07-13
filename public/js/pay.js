
//商品价格
var order_price = document.getElementsByClassName("order-price");

var sum = 0;

for(var i = 0; i<order_price.length; i++) {

	sum = parseFloat(sum) + parseFloat($(order_price[i]).html());

}

//商品价格
$(".shopprice").html(sum.toFixed(2));

//运费
var freight = parseFloat($(".freight").html());

var sumToFixed = parseFloat(sum.toFixed(2));

$(".total").html(freight + sumToFixed);


//确认下单
$("button[name='enter']").on("click", function() {

	//地址 姓名 手机 
	$("input[name='address-radio[]']").each(function() {

		var bool = $(this).prop("checked");

		if(bool) {

			//地址
			var text = $(this).next().find("span[name='address']").html();

			//姓名
			var name = $(this).next().find("span[name='name']").html();

			//手机
			var phone = $(this).next().find("span[name='phone']").html();

			var img = document.getElementsByClassName("order-img");

			//总价
			// var order_price = $(".total").html();

			var arr = [];

			for(var i =0; i<img.length; i++) {

				var pic = $(img[i]).find("img").attr("src");

				var shopname = $(img[i]).next().html();

				var order_price = $(img[i]).next().next().next().next().text();
				
				var arrData = [{
					cover_img:pic,
					goods_name:shopname,
					order_price:order_price,
					linkman:name,
					address:text,
					phone:phone
				}];

				Array.prototype.push.apply(arr, arrData);
			}
			
			$.ajax({

				type:"get",
				url:window.location.protocol+"//"+window.location.host+"/paysucceedAjax",
				data:{
					orderData:arr
				},
				dataType:"json",
				success:function(data) {
					
					if(data['data'] == true) {
						window.location.href = window.location.protocol+"//"+window.location.host+"/paysucceed?ordernum="+data['ordernum'];
					}


				},

			});
		}
	});
});

