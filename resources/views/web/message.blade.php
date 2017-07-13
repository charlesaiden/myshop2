@extends("web.master")
@section("title", "地址管理页")
@section("content")

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
                            <li class="active">
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
                            评论列表
                        </h5>
                    </div>
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>编号</th>
                                <th>订单ID</th>
                                <th>商品名称</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            @if($data)
                            @foreach($data as $v)
                            <tr>
                                <td>{{$v['id']}}</td>
                                <td>{{$v['orderid']}}</td>
                                <td>{{$v['goods_name']}}</td>
                                <td>
                                    @if($v['content'] == 0)
                                        待审核
                                    @elseif($v['content'] == 1)
                                        审核通过
                                    @else
                                        审核不通过
                                    @endif
                                </td>
                                <td>
                                    @if($v['content'] == 0)
                                        <span class="btn btn-success add-address-btn" id="modal-{{$v['id']}}" href="#modal-container-{{$v['id']}}" data-toggle="modal">修改评论</span>
                                    @elseif($v['content'] == 1)
                                        <span class="btn btn-warning add-address-btn">禁止操作</span>
                                    @else
                                        <span class="btn btn-success add-address-btn" id="modal-{{$v['id']}}" href="#modal-container-{{$v['id']}}" data-toggle="modal">修改评论</span>
                                    @endif
                                </td>
                            </tr>
                            <!-- 遮罩体 -->
                            <div class="modal fade" id="modal-container-{{$v['id']}}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                修改评论
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal"  action="{{url("message")}}"  method="post">
                                            <?php echo csrf_field(); ?>
                                                <input type="hidden" value="{{$v['id']}}" name="messageid">
                                                <textarea class="form-control" id="messageadd" name="messageadd" rows="10">{{$v['message']}}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                            <button type="submit" class="btn btn-success" id="button_1">修改</button>
                                        </div>
                                            </form>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    {{$page->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <script>
        var button_1 = document.getElementById('button_1');
        button_1.onclick = function () {
            var messageadd = document.getElementById('messageadd').value;

            if (messageadd == null || messageadd == "") {
                alert("评论不能为空");
                return false;
            }

        }
    </script>
