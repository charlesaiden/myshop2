@extends("web.master")
@section("title", "购物车页")
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

    <!-- 购物车订单开始 -->
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered order-table">
                <th>缩略图</th>
                <th>商品名称</th>
                <th>商品价格</th>
                <th>数量</th>
                <th>总计</th>
                <th>操作</th>

                @foreach($carydata as $val)

                <tr>

                    <td class="order-img"><img src="{{$val['pic']}}" alt="{{$val['goods_name']}}" class="img-rounded"></td>
                    <td>{{$val['goods_name']}}</td>
                    <td class="price">{{$val['shop_price']}}</td>
                    <td>
                        <span class="cart-sub min" >-</span>
                        <input type="text" name="good-num" value="{{$val['num']}}" class="cart-num">
                        <span class="cart-sub add" >+</span>
                    </td>
                    <td class="order-price">{{number_format($val['shop_price']*$val['num'], 2)}}</td>
                    <td><button type="button" class="btn btn-danger" val="{{$val['id']}}" name="delete">删除</button></td>
                </tr>
               @endforeach
            </table>
        </div>

        <div class="order-pay">
            <div class="order-payleft">
                总计:
                <span class="total">0.00</span>元

            </div>
            <div class="order-payright">
                <button type="button" class="btn btn-primary" name="shoping">购物</button>
                <button type="button" class="btn btn-info" name="pay">结算</button>
            </div>
        </div>
    </div>
    <!-- end -->
@endsection
@section("javaScript")

    <script src="./js/cart.js"></script>

@endsection