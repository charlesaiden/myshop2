

$("button[name='addaddress']").on("click", function() {

	var uid = $("select[name='province']").val();

	var uname = $("input[name='uname']").val();

	var uaddress = $("input[name='uaddress']").val();

	var uphone = $("input[name='uphone']").val();

	var postcode = $("input[name='postcode']").val();

	var phonePattern = /^1[3|4|5|8][0-9]\d{4,8}$/;

	var phoneBool = uphone.match(phonePattern);

	var postcodePattern = /^[0-9]{6}$/;

	var postcodeBool = postcode.match(postcodePattern);

	if(uid < 0) {

		alert("请选择地区!");
	
	} else if(uname == "") {
		alert("请填写收货人");
	} else if(uaddress == "") {
		alert("请填写详细地址");
	} else if(uphone == "") {
		alert("请填写手机号码");
	} else if(postcode == "") {
		alert("请填写邮箱(如不清楚请填写000000)");
	} else if(phoneBool == null) {
		alert("手机号码格式有误");
	} else if(postcodeBool == null) {
		alert("邮编格式有误");
	} else {

		var province = $("select[name='province'] option[value="+uid+"]").html();

		var cid = $("select[name='city']").val();

		var city = $("select[name='city'] option[value="+cid+"]").html();

		var countyid = $("select[name='county']").val();

		var county = $("select[name='county'] option[value="+countyid+"]").html();


		$.ajax({

			type:"POST",
			url:window.location.protocol+"//"+window.location.host+"/payAddress",
			data:{
				consignee:uname,
				phone:uphone,
				province:province,
				city:city,
				county:county,
				detailed_address:uaddress,
				code:postcode
			},
			headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data) {
            	
            	switch(data) {
            		case "1":
http://www.80yl.cn/pay/3
            			$("input[name='uname']").val("");

						$("input[name='uaddress']").val("");

						$("input[name='uphone']").val("");

						$("input[name='postcode']").val("");

						$("select[name='province']").val("-1")

						$("select[name='city'] option").remove();

						$("select[name='county'] option").remove();

						$("select[name='city']").append('<option value="-1">--请选择城市--</option>');

						$("select[name='county']").append('<option value="-1">--请选择所在县--</option>');

            			alert("添加成功");

            			var url = window.location.href;

            			window.location.href=url;

            			break;
            		case "2":

            		     $("input[name='uname']").val("");

						$("input[name='uaddress']").val("");

						$("input[name='uphone']").val("");

						$("input[name='postcode']").val("");

						$("select[name='province']").val("-1")

						$("select[name='city'] option").remove();

						$("select[name='county'] option").remove();

						$("select[name='city']").append('<option value="-1">--请选择城市--</option>');
						
						$("select[name='county']").append('<option value="-1">--请选择所在县--</option>');

            			alert("请勿重复提交");

            			var url = window.location.href;

            			window.location.href=url;
            			break;

            		default:
            			alert("添加失败");
            	}
            }
		});

	}

		
		
	

	
});



