/**
 * Created by 小C on 2017/6/26.
 */

$("button[name='login']").on("click", function() {

    $.ajax({

        type:"POST",
        url:"loginAjax",
        data:"username="+$("input[name='username']").val()+"&pass="+$("input[name='pass']").val(),
        headers:{
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success:function(data) {

            if(data > 1) {
                alert("登录成功");
                window.location.href=history.go(-1);

            }else if (data == 1){

                alert("请激活您邮箱后在登录");

            }else{

                var that = $("input[name='pass']");

                //改变提示图标和提示文本
                that.next().css({display:"block",color:"red"}).find('i').removeClass().addClass("glyphicon glyphicon-remove").next()
                    .html("用户名或密码不正确");
            }
        }
    });

});
