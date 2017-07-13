@extends("web.master")
@section("title", "地址管理页")
@section("content")
    {{--<script src="{{asset('js/Area1.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('js/AreaData_min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('js/jquery-1.7.min.js')}}" type="text/javascript"></script>--}}
    <div style="display: block; margin-top:52px;"></div>

    <!-- 路径导航 -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{url('index')}}">首页</a></li>
            <li class="active">用户中心</li>
        </ol>
    </div>
    <!-- end -->

    <!-- 地址管理 -->
    <div class="container">
        <div class="row">
            <!-- 菜单栏 -->
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4>用户中心</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="{{url("center")}}">
                                    <span class="glyphicon glyphicon-user"></span>
                                    我的资料
                                </a>
                            </li>
                            <li class="active">
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
            <!-- 内容栏 -->
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>
                            <span class="glyphicon glyphicon-th-list"></span>
                            地址列表
                        </h5>
                    </div>
                    <br>
                    <div class="address-panel">
                        <form class="form-horizontal" method="post" action="{{url("addresedat")}}">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="addresid" value="{{$addres_data['id']}}">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">地区选择</label>
                                <div class="col-sm-10">
                                    <select id="s_province" name="province" class="form-control"><select>  
                                    <select id="s_city" name="city" class="form-control"><select>  
                                    <select id="s_county" name="county" class="form-control"><select>
                                    <script class="resources library" src="{{asset('js/area.js')}}" type="text/javascript"></script>
                                    <script type="text/javascript">_init_area();</script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">详细地址</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="uaddress" value="{{$addres_data['detailed_address']}}" id="uaddress">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">收货人姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="uname" value="{{$addres_data['consignee']}}" id="uname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="uphone" value="{{$addres_data['phone']}}" onkeyup="value=value.replace(/[^\d]/g,'')" id="uphone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮编</label>
                                <div class="col-sm-10">
                                    <input type="code" class="form-control" name="code" value="{{$addres_data['code']}}" onkeyup="value=value.replace(/[^\d]/g,'')" id="code">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success" id="button_1">确认编辑</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <script>
        var button_1 = document.getElementById('button_1');
        button_1.onclick = function () {
            var s_province = document.getElementById('s_province').value;
            var s_city = document.getElementById('s_city').value;
            var s_county = document.getElementById('s_county').value;
            var button_1 = document.getElementById('uaddress').value;
            var uname_1 = document.getElementById('uname').value;
            var uphone_1 = document.getElementById('uphone').value;
            var code_1 = document.getElementById('code').value;

            if (s_province == null || s_province == "" || s_province == "省份") {
                alert("请修改省份");
                return false;
            }

            if (s_city == null || s_city == "" || s_city == "地级市") {
                alert("请修改地级市");
                return false;
            }

            if (s_county == null || s_county == "" || s_county == "市、县级市") {
                alert("请修改市、县级市");
                return false;
            }

            if (button_1 == null || button_1 == "") {
                alert("详细地址不能为空");
                return false;
            }

            if (uname_1 == null || uname_1 == "") {
                alert("收件人不能为空");
                return false;
            }

            if (uphone_1 == null || uphone_1 == "") {
                alert("手机号码不能为空");
                return false;
            }

            if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(uphone_1))) {
                alert("不是完整的11位手机号或者正确的手机号");
                return false;
            }

            if (code_1 == null || code_1 == "") {
                alert("邮编不能为空");
                return false;
            }
            if (!(/^\d{6}$/.test(code_1))) {
                alert("请输入正确的邮政编码");
                return false;
            }
        }
    </script>
