@extends("web.master")
@section("title", "登录页")
@section("meta")
    <meta name="_token" content="{{ csrf_token() }}">
@endsection
@section("content")
    <div style="display: block; margin-top:52px;"></div>
    <!-- 路径导航 -->
    <div class="container">
    <ol class="breadcrumb">
    <li><a href="#">首页</a></li>
    <li class="active">登录</li>
    </ol>
    </div>
    <!-- end -->

    <!-- 登录表单 -->
    <div class="container">
        <div class="login-box">
            <div class="login">
                <div class="login-font">用户登录</div>
                <div class="login-form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">用户名:</label>
                            <div class="col-sm-10">
                                <input type="text" name="username"  class="form-control" id="inputEmail3" placeholder="用户名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">密码:</label>
                            <div class="col-sm-10">
                                <input type="password" name="pass" data-tip="请输入长度大于6的密码" class="form-control" id="inputPassword3" placeholder="密码">
                                <div class="hint">
                                    <br>
                                    <i class="glyphicon glyphicon-remove"></i>
                                    <span class="form-span">用户名或密码不正确</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-success submit" name="login">登录</button>&ensp;&ensp;&ensp;&ensp;<a href="{{url('Retrieve')}}">忘记密码</a>
                                <br>
                                <br>
                                <p><a href="{{url('register')}}">还没有账号?马上注册</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
@endsection
@section("javaScript")

        <!--引入JS文件-->
    <script src="{{asset('js/loginAjax.js')}}"></script>

@endsection