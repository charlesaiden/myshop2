<?php
    $arr =[0=>"待发货",1=>"待收货",2=>"待评价"]
?>
@extends("web.master")
@section("title", "订单页")
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
                            <span class="tit">订单列表</span>
                        </h5>
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered order-table">
                                <th>缩略图</th>
                                <th>商品名称</th>
                                <th>订单金额</th>
                                <th>订单编号</th>
                                <th>订单状态</th>


                                @foreach($data as $val)
                                    <tr>
                                        <td class="order-img"><img src="{{$val['imgurl']}}" alt="商品缩略图" class="img-rounded"></td>
                                        <td>{{$val['goods']}}</td>
                                        <td>{{$val['total']}}</td>
                                        <td>{{$val['ordernum']}}</td>
                                        <td>{{$arr[$val['status']]}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div>
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
                var button_1 = document.getElementById('uaddress_1').value;
                var uname_1 = document.getElementById('uname_1').value;
                var uphone_1 = document.getElementById('uphone_1').value;
                var code_1 = document.getElementById('code_1').value;


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

                if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(uphone_1))) {
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
