@extends("web.master")
@section("title", "商品详情页")
@section("content")

    <div style="display: block; margin-top:52px;"></div>
    <!-- 路径导航 -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">首页</a></li>
            <li class="active">家电</li>
        </ol>
    </div>
    <!-- end -->

    <!-- 详情页开始 -->
    <div class="container">
        <div class="good-left">
            <div class="good-border">
                <img src="./images/4.jpg" alt="商品图" id="small" width="500" height="500">
            </div>
            <div class="good-big" id="big">
                <img src="./images/4.jpg" alt="商品图" width="1000" height="1000">
            </div>
            <div class="good-small">
                <ul>
                    <li><div><a href=""><img src="./images/1.jpg" alt="" align="center" id="small-01"></a></div></li>
                    <li><div><a href=""><img src="./images/2.jpg" alt="" align="center" id="small-02"></a></div></li>
                    <li><div><a href=""><img src="./images/01.jpg" alt="" align="center" id="small-03"></a></div></li>
                </ul>
            </div>
        </div>
        <div class="good-right">
            <table class="table table-hover table-responsive">

                <caption>{{$info->goods_name}}</caption>
                <tr>
                    <td class="good-td">商品货号:</td>
                    <td>{{$info->goods_sn}}</td>
                </tr>
                <tr>
                    <td class="good-td">商品库存:</td>
                    <td>{{$info->store_count}}</td>
                </tr>
                <tr>
                    <td class="good-td">品牌:</td>
                    <td>{{$info->goods_name}}</td>
                </tr>
                <tr>
                    <td class="good-td">会员等级:</td>
                    <td>VIP2</td>
                </tr>
                <tr>
                    <td class="good-td">商品价格:</td>
                    <td class="good-price">{{$info->shop_price}}</td>
                </tr>
                <tr>
                    <td class="good-td">购买数量:</td>
                    <td>
                        <span class="sub-num" id="minus">-</span>
                        <input type="text" name="good-num" value="1" class="good-num">
                        <span class="sub-num" id="add">+</span>
                    </td>
                </tr>
            </table>
            <div align="center">
                <button type="button" class="btn btn-primary">加入购物车</button>
                <button type="button" class="btn btn-success">立即购买</button>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- 选项卡   -->
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="tabbable" id="tabs-78962">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#panel-8603" data-toggle="tab">商品详情</a>
                        </li>
                        <li>
                            <a href="#panel-971892" data-toggle="tab">商品评论</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="panel-8603">
                            <p>
                                这里是商品详情
                            </p>
                        </div>
                        <div class="tab-pane" id="panel-971892">
                            <p>
                                这里是商品评论
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
@endsection

@section("javaScript")

    <!--引入JS文件-->
    <script src="{{asset('js/good.js')}}"></script>

@endsection
