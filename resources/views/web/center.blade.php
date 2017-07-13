@extends("web.master")
@section("title", "用户中心页")
@section("content")

    <div style="display: block; margin-top:52px;"></div>

    <!-- 路径导航 -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li class="active">用户中心</li>
        </ol>
    </div>
    <!-- end -->

    <!-- 用户信息 -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4>用户中心</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a href="{{url("center")}}">
                                    <span class="glyphicon glyphicon-user"></span>
                                    我的资料
                                </a>
                            </li>
                            <li>
                                <a href="{{url("addres")}}">
                                    <span class="glyphicon glyphicon-flag"></span>
                                    地址管理
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                    站内信息
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-tags"></span>
                                    我的标签
                                </a>
                            </li>
                            <li>
                                <a href="{{url("message")}}">
                                    <span class="glyphicon glyphicon-comment"></span>
                                    我的评论
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-duplicate"></span>
                                    我的订单
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-retweet"></span>
                                    我的退货单
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-heart"></span>
                                    我的收藏
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-yen"></span>
                                    资金管理
                                </a>
                            </li>
                            <li>
                                <a href="{{url('quit')}}">
                                    <span class="glyphicon glyphicon-lock"></span>
                                    退出
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="tit">用户基本信息</p>
                        <table class="table table-striped table-hover table-bordered order-tab">
                            <tbody>
                            <tr>
                                <th class="col-md-3">用户名称</th>
                                <td>{{$user_datas['username']}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">昵称</th>
                                <td>{{$user_datas['pname']}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">真实姓名</th>
                                <td>{{$user_datas['name']}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">性别</th>
                                <td>
                                    @if($user_datas['sex'] == 1)
                                        男
                                    @elseif($user_datas['sex'] == 2)
                                        女
                                    @else
                                        保密
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3">地址</th>
                                <td>{{$user_datas['address']}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">邮编</th>
                                <td>{{$user_datas['code']}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">手机</th>
                                <td>{{$user_datas['phone']}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">邮箱</th>
                                <td>{{$user_datas['email']}}</td>
                            </tr>
                            <tr>
                                <th class="col-md-3">登录IP</th>
                                <td>{{isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR']}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- 手风琴 -->
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a class="panel-title" data-toggle="collapse" data-parent="#panel-937561" href="#panel-element-1">
					                   	<span class="edit-user-profile btn btn-success">
											<span class="glyphicon glyphicon-pencil" >
												编辑资料
											</span>
										</span>
                                        </a>
                                    </div>
                                    <div id="panel-element-1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <form class="form-horizontal" method="post" action="{{url("center")}}">
                                            <?php echo csrf_field(); ?>
                                            <div class="address-panel">
                                                <div class="form-group">
                                                        <label class="col-sm-2 control-label">用户名称</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="uname" value="{{$user_datas['username']}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">昵称</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="pname"  value="{{$user_datas['pname']}}" id="panme">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">真实姓名</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="name"  value="{{$user_datas['name']}}" id="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">性别</label>
                                                            {{--<input type="text" class="form-control dropdown-toggle" name="sex" placeholder="@if($user_datas['sex'] == 1)男@elseif($user_datas['sex'] == 2)女@else保密@endif">--}}
                                                                <div class="form-group col-sm-10">
                                                                    <select class="form-control" style="width: 90%;" name="sex">
                                                                        <option>
                                                                            @if($user_datas['sex'] == 1)
                                                                                男
                                                                            @elseif($user_datas['sex'] == 2)
                                                                                女
                                                                            @else
                                                                                保密
                                                                            @endif
                                                                        </option>

                                                                        @if($user_datas['sex'] == 1)
                                                                            <option value="0">保密</option>
                                                                            <option value="2">女</option>
                                                                        @elseif($user_datas['sex'] == 2)
                                                                            <option value="0">保密</option>
                                                                            <option value="1">男</option>
                                                                        @else
                                                                            <option value="1">男</option>
                                                                            <option value="2">女</option>
                                                                         @endif
                                                                    </select>
                                                                </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">地址</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="address"  value="{{$user_datas['address']}}" id="address">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">邮编</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="code"  value="{{$user_datas['code']}}" onkeyup="value=value.replace(/[^\d]/g,'') " id="code">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">电子邮件</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" name="uemail" value="{{$user_datas['email']}}" id="email" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">手机号码</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="uphone"  value="{{$user_datas['phone']}}"  onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" id="phone">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-success" id="button_add">确认修改</button>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 手风琴结束 -->
                </div>
            </div>
        </div>
    </div>

    <!-- end -->


    <script>
        var button_add = document.getElementById('button_add');
//        console.log(button_add);
        button_add.onclick = function () {

            var pname = document.getElementById('panme').value;
            console.log(pname);
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var code = document.getElementById('code').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;

            if(pname == null || pname == ""){
                alert("昵称不能为空");
                return false;
            }

            if(name == null || name == ""){
                alert("真实姓名不能为空");
                return false;
            }

            if(address == null || address == ""){
                alert("地址不能为空");
                return false;
            }

            if (code == null || code == "") {
                alert("邮编不能为空");
                return false;
            }

            if (!(/^\d{6}$/.test(code))) {
                alert("请输入正确的邮政编码");
                return false;
            }

            if (email == null || email == "") {
                alert("邮箱不能为空");
                return false;
            }

            if (!(/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/.test(email))) {
                alert("请输入正确的邮箱地址");
                return false;
            }

            if (phone == null || phone == "") {
                alert("手机号码不能为空");
                return false;
            }

            if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(phone))) {
                alert("不是完整的11位手机号或者正确的手机号");
                return false;
            }
        }
    </script>
@endsection


