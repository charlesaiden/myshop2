@extends("web.master")
@section("title", "订单页")
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

    <!-- 订单页 -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4>用户中心</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-user"></span>
                                    我的资料
                                </a>
                            </li>
                            <li>
                                <a href="#">
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
                                <a href="#">
                                    <span class="glyphicon glyphicon-comment"></span>
                                    我的留言
                                </a>
                            </li>
                            <li class="active">
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
                                <a href="#">
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
                    <div class="panel-heading">
                        <h5>
                            <span class="glyphicon glyphicon-th-list"></span>
                            地址列表
                        </h5>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th style="text-align:center">订单编号</th>
                                <th style="text-align:center">订单金额</th>
                                <th style="text-align:center">订单状态</th>
                                <th class="col-md-3" style="text-align:center">操作</th>
                            </tr>
                            <tr>
                                <td style="text-align:center">2017061910690</td>
                                <td style="text-align:center">999.00</td>
                                <td style="text-align:center">已付款</td>
                                <td>
                                    <div style="text-align:center">
                                        <a href="#" class="btn btn-danger btn-cancel">
                                            <i class="glyphicon glyphicon-remove"></i>
                                            取消
                                        </a>
                                        <a class="btn btn-success" id="modal-770114" href="#modal-container-770114" data-toggle="modal">
                                            查看
                                            <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                        </a>
                                    </div>

                                    <!-- 遮罩体 -->
                                    <div class="modal fade" id="modal-container-770114" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">
                                                        订单详细
                                                    </h4>
                                                </div>
                                                <div class="modal-body col-md-5">
                                                    <div class="address-panel2">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h5>
                                                                    <span class="glyphicon glyphicon-th-list"></span>
                                                                    <span class="tit">订单详细</span>
                                                                </h5>
                                                            </div>
                                                            <div class="panel-body">
                                                                <table class="table table-bordered table-hover">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th>订单编号</th>
                                                                        <td>2017061910691</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>商品总金额</th>
                                                                        <td>999.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>订单金额</th>
                                                                        <td>999.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>订单状态</th>
                                                                        <td>待发货</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>配送方式</th>
                                                                        <td>顺丰速运</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>收货人姓名</th>
                                                                        <td>赖皮</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>收货人电话</th>
                                                                        <td>18888888888</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>收货地址</th>
                                                                        <td>广州天河兄弟连</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h5>
                                                                    <span class="glyphicon glyphicon-th-list"></span>
                                                                    <span class="tit">商品详情</span>
                                                                </h5>
                                                            </div>
                                                            <div class="pane1-body order">

                                                                <table class="table table-bordered table-hover table-striped cart-table table-lineheight">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th style="text-align:center">缩略图</th>
                                                                        <th style="text-align:center">商品名称</th>
                                                                        <th style="text-align:center">商品属性</th>
                                                                        <th style="text-align:center">商品价格</th>
                                                                        <th style="text-align:center">商品数量</th>
                                                                        <th style="text-align:center">总计</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="order-img">
                                                                            <a href="#">
                                                                                <img src="./images/1.jpg" alt="" class="cart-thumb img-thumbnail">
                                                                            </a>
                                                                        </td>
                                                                        <td class="vertical-align:middle;" style="text-align:center">
                                                                            <a href="#">测试测试测试测试测试</a>
                                                                        </td>
                                                                        <td class="vertical-align:middle;" style="text-align:center">
                                                                            红色
                                                                        </td>
                                                                        <td class="vertical-align:middle;" style="text-align:center">
                                                                            999.00
                                                                        </td>
                                                                        <td class="vertical-align:middle;" style="text-align:center">
                                                                            2
                                                                        </td>
                                                                        <td class="vertical-align:middle;" style="text-align:center">
                                                                            999.00
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

@endsection