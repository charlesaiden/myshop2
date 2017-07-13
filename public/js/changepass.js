var passState = false;
var upassState = false;

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
            url:"registerAjax",
            data:"email="+that.val(),
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data) {

                if(data == 0) {

                    //改变提示图标和提示文本
                    that.next().css({"display":"none"});

                    emailState = true;

                }else{

                    //改变提示图标和提示文本
                    that.next().css({color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
                        .html("email已存在");

                    emailState = false;
                }
            }
        });
    }
});

//密码获取焦点触发事件
$("input[name='pass']").focus(function() {

    var that = $(this);

    //获取焦点时重新定义边框色,防止后面做改变后再次获取焦点时不是原色
    that.css({"border-color":"#66afe9"});

    //改变提示图标和提示文本
    that.next().css({color:"#c1b6b6"}).find('i').removeClass().addClass("glyphicon glyphicon-pencil").next()
        .html("建议使用字母、数字和符号两种及以上的组合，6-20个字符");

    //获取焦点时触发提示
    $(this).next().css({display:"block"});

});

//密码失去焦点触发事件
$("input[name='pass']").on('blur', function() {

    var that = $(this);

    if(that.val() == ""){

        that.next().css({"display":"none"});

    } else if(that.val().length < 6 || that.val().length > 20) {

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("请输入6-20个字符");

        passState = false;

    } else {

        that.next().css({"display":"none"});

        passState = true;

    }
});

//确认密码获取焦点触发事件
$("input[name='upass']").focus(function() {

    var that = $(this);

    //获取焦点时重新定义边框色,防止后面做改变后再次获取焦点时不是原色
    that.css({"border-color":"#66afe9"});

    //改变提示图标和提示文本
    that.next().css({color:"#c1b6b6"}).find('i').removeClass().addClass("glyphicon glyphicon-pencil").next()
        .html("请再次输入密码");

    //获取焦点时触发提示
    $(this).next().css({display:"block"});

});

//确认密码失去焦点触发事件
$("input[name='upass']").on('blur', function() {

    var that = $(this);

    if(that.val() == ""){

        that.next().css({"display":"none"});

    } else if(!(that.val() == $("input[name='pass']").val())) {

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("两次输入的密码不一样");

        upassState = false;

    } else {

        that.next().css({"display":"none"});

        upassState = true;

    }
});

//点击修改
$("button[name='changepass']").on("click", function() {

     if($("input[name='pass']").val() == "") {

        var that = $("input[name='pass']");

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({display:"block",color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("请输入密码");

    } else if($("input[name='upass']").val() == "") {

        var that = $("input[name='upass']");

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({display:"block",color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("请再次输入密码");

    } else if($("input[name='upass']").val() != $("input[name='pass']").val()){


        var that = $("input[name='upass']");

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({display:"block",color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("两次输入的密码不一至");

    }else if(passState == true && upassState == true){

        $.ajax({

            type:"POST",
            url:window.location.protocol+"//"+window.location.host+"/changepass",
            data: "changepass="+$("input[name='changepass']").val()+"&pass="+$("input[name='pass']").val(),
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data) {

                if(data > 0) {
                    alert("修改成功");
                    window.location.href=window.location.protocol+"//"+window.location.host+'/login';
                }
            }
        });
        $("input[name='pass']").val("");
        $("input[name='upass']").val("");

    } else {

        alert("修改失败");

    }
});