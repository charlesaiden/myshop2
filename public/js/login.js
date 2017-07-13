if($('#inputPassword3').val()==""){
	$('#inputPassword3').on('click',function(){ 
	  $("p").remove();
	  if($(this).val()==""){   
	            $(this).after("<p style='color:red'>请输入密码<p>");   
	        }   
	        return false;       
	});



	$('#inputPassword3').blur('click',function(){ 
	  	  $("p").remove(); 

	  	  var str = $('#inputPassword3').val();
	  	  // console.log(str);
	      var ret = /[\!\@\#\$\%\^&\*\_\+\-\{\}\(\)\?]+/;
	       // console.log(ret.test(str));
	      if(ret.test(str)==false){
	      	$(this).after("<p style='color:red'>密码必须包含一个特殊字符<p>"); 
	        return false; }  


		  var str = $('#inputPassword3').val();
	  	  // console.log(str);
	      var ret = /[A-Z]+/;
	       // console.log(ret.test(str));
	      if(ret.test(str)==false){
	      	$(this).after("<p style='color:red'>密码必须包含大写字母<p>"); 
	        return false;  }


	        var str = $('#inputPassword3').val();
	  	  // console.log(str);
	      var ret = /\d+/;
	       // console.log(ret.test(str));
	      if(ret.test(str)==false){
	      	$(this).after("<p style='color:red'>密码必须包含数字<p>"); 
	        return false;

	   }
});}

// $('submit').on('click',function(){
// 	$("#inputPassword3").on('click',function(){
// 	      var str = $(this).val();
// 	      var ret = /[\!\@\#\$\%\^&\*\_\+\-\{\}\(\)\?]+/;
// 	      if(ret.test(str)){
// 	        return true;
// 	      }else{
// 	      	$(this).after("<p>密码必须包含特殊字符<p>"); 
// 	        return false;
// 	      }
// };
// });
// 	{
// 	$("#inputPassword3").on('click',function(){
// 	      var str = $(this).val();
// 	      var ret = /[\!\@\#\$\%\^&\*\_\+\-\{\}\(\)\?]+/;
// 	      if(ret.test(str)){
// 	        return true;
// 	      }else{
// 	      	$(this).after("<p>密码必须包含特殊字符<p>"); 
// 	        return false;
// 	      }
	      
// 	});
// };
