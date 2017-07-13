/*--------------------------------------------------购物车-------------------------------------------------------------*/

//全选
function checkAll() {

	//给全选按钮绑定点击事件
	$("input[name='checkall']").on("click", function() {

		//获取当前商品选择框是否已选
		var bool = $("input[name='check[]']").prop('checked');

		//判断只要商品框有一个没选的时候点击全选按钮就全选所有商品
		if(bool == false) {

			//全选所有商品
			$("input[name='check[]']").prop('checked', true);

		} else {

			//如果已经全选了商品的时候点击全选按钮则把所有商品变为未选,并把全选按钮也变为未选
			$("input[name='check[]']").prop('checked', false);
			$("input[name='checkall']").prop('checked', false);

		}

	});

	//给商品选择按钮绑定点击事件
	$("input[name='check[]']").on("click", function() {

		//点击任意一个商品选择按钮则判断当前商品按钮是否为未选状态，是则把全选按钮变为未选
		$(this).each( function() {

			//当前按钮状态
			var bool = $(this).prop('checked');
			
			//未选状态
			if(bool == false) {

				//把全选按钮变为未选
				$("input[name='checkall']").prop('checked', false);
			}
		});
		
		
	});

}

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

	});
}


//全选
checkAll();

//购买数量
goodNum();

