/**
 * Created by 小C on 2017/6/22.
 */

//  每个输入框的状态(只有全部为真时才能提交注册)
var usernameState = false;
var emailState = false;
var passState = false;
var upassState = false;

//用户名获取焦点触发事件
$("input[name='username']").focus(function() {

    var that = $(this);

    //获取焦点时重新定义边框色,防止后面做改变后再次获取焦点时不是原色
    that.css({"border-color":"#66afe9"});

    //改变提示图标和提示文本
    that.next().css({color:"#c1b6b6"}).find('i').removeClass().addClass("glyphicon glyphicon-pencil").next()
        .html("支持中文、字母、数字、“-”“_”的组合，4-20个字符");

    //获取焦点时触发提示
    $(this).next().css({display:"block"});

});

//用户名失去焦点触发事件
$("input[name='username']").on("blur",function() {

    var that = $(this);

    //正则限制格式
    var pattern = /^[a-zA-Z0-9_-]{4,20}$/;

    var bool = that.val().match(pattern);

    //输入为空时触发提示
    if(that.val() == "") {

        //隐藏提示
        that.next().css({display: "none"});

    } else if(that.val().length < 4 || that.val().length > 20) {

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("请输入4-20个字符");

        usernameState = false;

    } else if(bool == null){

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("格式错误，仅支持汉字、字母、数字、“-”“_”的组合");

        usernameState = false;

    } else {
        //这里触发ajax查询用户名是否已经存在
        //that.next().css({"display":"none"});
        $.ajax({

            type:"POST",
            url:"registerAjax",
            data:"username="+that.val(),
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data) {

                if(data == 0) {

                    //改变提示图标和提示文本
                    that.next().css({"display":"none"});

                    usernameState = true;

                }else{

                    //改变提示图标和提示文本
                    that.next().css({color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
                        .html("用户名已存在");

                    usernameState = false;
                }
            }
        });
    }


});

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

                        .html("邮箱已存在");

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


//点击注册
$("button[name='register']").on("click", function() {

    if($("input[name='username']").val() == "") {

        var that = $("input[name='username']");

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({display:"block",color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("请输入用户名");

    } else if($("input[name='email']").val() == "") {

        var that = $("input[name='email']");

        //输入框框变为红色
        that.css({"border-color":"red"});

        //改变提示图标和提示文本
        that.next().css({display:"block",color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
            .html("请输入邮箱");

    } else if($("input[name='pass']").val() == "") {

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

    }else if(usernameState == true && emailState == true && passState == true && upassState == true){

        $.ajax({

            type:"POST",
            url:"registerAjax",
            data:"username="+$("input[name='username']").val()+"&email="+$("input[name='email']").val()
            +"&pass="+$("input[name='pass']").val(),
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function(data) {

                if(data > 0) {
                    alert("注册成功,请打开您的邮箱进行激活");
                    window.location.href='login';
                }
            }
        });
        $("input[name='username']").val("");
        $("input[name='email']").val("");
        $("input[name='pass']").val("");
        $("input[name='upass']").val("");
        //改变提示图标和提示文本
        $("input[name='username']").next().css({display:"none"});

    } else {

        alert("注册失败");

    }
});
