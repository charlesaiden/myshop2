@extends("web.master")
@section("title", "支付成功页")
@section("content")

    <div style="display: block; margin-top:52px;"></div>

    <!-- 路径导航 -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li class="active">家电</li>
        </ol>
    </div>
    <!-- end -->

    <!-- 订单支付成功 -->
    <div class="container">
        <div class="paysucceed">
            <div class="paysucceed-bg">您已经成功下单</div>
            <div class="paysucceed-bluebg">
                <div class="paysucceed-left">
                    <span>订单编号：{{$_GET['ordernum']}}</span>
                    <a href="">查看我的订单</a>
                </div>
                <div class="paysucceed-right">
                    订单金额:120.00
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
@endsection