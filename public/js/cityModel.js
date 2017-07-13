
//三级联动

//一加载就请求出省份信息
$.get(

		window.location.protocol+"//"+window.location.host+"/cityModel",
		{
			upid:0,
		},

		function(data) {
			for(var i =0; i<data.length; i++) {
				
				$("select[name='province']").append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
			}
		},

		'json'
	);

//绑定事件值改变时触发
$("select[name='province']").on("change", function() {
	
	var id = $(this).val();

	var that = $(this);

	if(!(id == -1)){

	
	$.get(

		
		window.location.protocol+"//"+window.location.host+"/cityModel",

		{
			upid:id
		},

		function(data) {

			$("select[name='city'] option").remove();
			$("select[name='county'] option").remove();


			for(var i =0; i<data.length; i++) {
				
				$("select[name='city']").append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
			
				
			}

			$.get(

				window.location.protocol+"//"+window.location.host+"/cityModel",

				{
					upid:data[0].id
				},

				function(data) {

					$("select[name='county'] option").remove();
				

					for(var i =0; i<data.length; i++) {
						
						$("select[name='county']").append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
						
					}
				},

				'json'

				);

		},

		'json'

		);
} else {

	$("select[name='city'] option").remove();
	$("select[name='county'] option").remove();
	$("select[name='city']").append('<option value="-1">--请选择城市--</option>');
	$("select[name='county']").append('<option value="-1">--请选择所在县--</option>');
	
}

	$("select[name='city']").on("change", function() {

		var cid = $(this).val();


		$.get(

		window.location.protocol+"//"+window.location.host+"/cityModel",

		{
			upid:cid
		},

		function(data) {

			$("select[name='county'] option").remove();

			for(var i =0; i<data.length; i++) {
				
				$("select[name='county']").append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
			}
		},

		'json'

		);
	});
});
