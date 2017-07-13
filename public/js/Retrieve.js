
var emailState = false;

//邮箱获取焦点触发事件
$("input[name='email']").focus(function() {

    var that = $(this);

    //获取焦点时重新定义边框色,防止后面做改变后再次获取焦点时不是原色
    that.css({"border-color":"#66afe9"});

    //改变提示图标和提示文本
    that.next().css({color:"#c1b6b6"}).find('i').removeClass().addClass("glyphicon glyphicon-pencil").next()
        .html("支持合法的邮箱格式");

    //获取焦点时触发提示
    $(this).next().css({display:"block"});

});

//邮箱失去焦点触发
$("input[name='email']").on('blur', function() {

    var that = $(this);

    //正则限制邮箱格式
    var pattern = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;

    var bool = that.val().match(pattern);

    if(that.val() == ""){

        that.next().css({"display":"none"});

    } else if(bool == null) {

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("请输入合法的邮箱格式");

        emailState = false;

    } else {

        $.ajax({

            type:"POST",
            url:"Retrieve",
            data:"email="+that.val(),
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data) {

                if(data == 0) {

                    //改变提示图标和提示文本
                    that.next().css({color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
                        .html("email不存在");

                    emailState = false;

                }else{

                    //改变提示图标和提示文本
                    that.next().css({"display":"none"});

                    emailState = true;
                }
            }
        });
    }
});

$("button[name='Retrieve']").on("click", function() {

    if($("input[name='email']").val() == "") {

        var that = $("input[name='email']");

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({display:"block",color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("请输入邮箱");

    }else if(emailState == true){

        $.ajax({

            type:"POST",
            url:"Retrievepass",
            data:"email="+$("input[name='email']").val(),
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data) {

                if(data > 0) {
                    alert("提交成功,请打开您的邮箱进行修改密码");
                }else{
                    alert("提交失败");
                }
            }
        });
    }
});