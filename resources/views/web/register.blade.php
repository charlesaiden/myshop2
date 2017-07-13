@extends("web.master")
@section("title", "注册页")
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

    <!-- 注册表单 -->
    <div class="container">
        <div class="register-box">
            <div class="register">
                <div class="register-font">用户注册</div>
                <div class="register-form">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">用户名:</label>
                            <div class="col-sm-10 ment-add">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="用户名" name="username">
                                <div class="hint">
                                    <br>
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <span class="form-span">支持中文、字母、数字、“-”“_”的组合，4-20个字符</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">邮箱:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="邮箱" name="email">
                                <div class="hint">
                                    <br>
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <span class="form-span">支持中文、字母、数字、“-”“_”的组合，4-20个字符</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">密码:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="密码" name="pass">
                                <div class="hint">
                                    <br>
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <span class="form-span">支持中文、字母、数字、“-”“_”的组合，4-20个字符</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">确认密码:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="请再次输入密码" name="upass">
                                <div class="hint">
                                    <br>
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <span class="form-span">请再次输入密码</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-success" name="register">注册</button>
                                <br>
                                <br>
                                <p><a href="{{url('login')}}">已有账号?马上登录</a></p>
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
    <script src="{{asset('js/registerAjax.js')}}"></script>

@endsection
