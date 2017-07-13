@extends("web.master")
@section("title", "支付页")
@section("meta")
    <meta name="_token" content="{{ csrf_token() }}">
@endsection
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

    <!-- 地址列表 -->
    <div class="container">
        <div class="address-list">
            <div class="address-bg">地址列表</div>
            <div class="address-add">
                <!-- 添加地址开始 -->
                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <a id="modal-770114" href="#modal-container-770114" role="button" class="btn" data-toggle="modal" style="padding:0px;"><button type="button" class="btn btn-success">添加地址</button></a>

                        <div class="modal fade" id="modal-container-770114" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            添加地址
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="address-panel">
                                            <form class="form-horizontal">

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">地区选择</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="province" id="province" style="margin-left:0px;">
                                                            <option value="-1">--请选择省份--</option>

                                                        </select>
                                                        <select class="form-control" name="city" id="city">
                                                            <option value="-1">--请选择城市--</option>

                                                        </select>
                                                        <select class="form-control" name="county" id="county">
                                                            <option value="-1">--请选择所在县--</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">收货人姓名</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="uname" placeholder="收货人姓名">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">详细地址</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="uaddress" placeholder="详细地址">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">手机</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="uphone" placeholder="手机">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">邮编</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="postcode" placeholder="邮编">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> <button type="button" class="btn btn-primary" name="addaddress">添加</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
            <div class="address-display">

                @foreach($addressData as $addval)
                    <div class="panel-heading">
                        @if($addval['status'] == 1)
                            <input type="radio" name="address-radio[]" val="{{$addval['id']}}" checked>
                            @else
                            <input type="radio" name="address-radio[]" val="{{$addval['id']}}">
                        @endif
                        <a class="panel-title"  href="{{url('addresedat/'.$addval['id'])}}"><span name="address">{{$addval['province'].$addval['city'].$addval['county'].$addval['detailed_address']}}</span>
                            <span name="name">{{$addval['consignee']}} </span> <span name="phone">{{$addval['phone']}}</span></a>
                    </div>
                @endforeach
        </div>
    </div>
    </div>
    <!-- end -->

    <!-- 支付方式 -->
    <div class="container">
        <div class="pay-list">
            <div class="pay-bg">支付方式</div>
            <div class="pay-add">
                <table>
                    <tr>
                        <td>请选择支付方式</td>
                        <td>
                            <select class="form-control" name="payment" id="payment" style="margin-left:10px; width:200px;">
                                <option>--请选择支付方式--</option>
                                <option value="支付宝">支付宝</option>
                                <option value="微信">微信</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- end -->


    <!-- 商品列表 -->
    <div class="container">
        <div class="pay-list">
            <div class="pay-bg">商品列表</div>
            <div class="pay-add">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered order-table">
                        <th>缩略图</th>
                        <th>商品名称</th>
                        <th>商品价格</th>
                        <th>数量</th>
                        <th>总计</th>

                        @foreach($data as $val)
                            <tr>
                                <td class="order-img"><img src="{{asset($val['cover_img'])}}" alt="商品缩略图" class="img-rounded"></td>
                                <td>{{$val['goods_name']}}</td>
                                <td>{{$val['shop_price']}}</td>
                                <td>
                                    @if($goodnum == null)
                                        {{$val['goodnum']}}
                                        @else
                                        {{$goodnum}}
                                    @endif
                                </td>
                                <td class="order-price">
                                    @if($goodnum == null)
                                        {{number_format($val['shop_price']*$val['goodnum'], 2)}}
                                        @else
                                        {{number_format($val['shop_price']*$goodnum, 2)}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- start -->
                <div class="pay-pay">
                    <div class="pay-left">
                        <span>商品价格:</span>
                        <strong class="shopprice">0.00</strong>
                        <span>+</span>
                        <span>运费:</span>
                        <strong class="freight">0.00</strong>
                        <span>=</span>
                        <strong class="total">0.00元</strong>
                    </div>
                    <div class="order-payright">
                        <button type="button" class="btn btn-info" name="enter">确认下单</button>
                    </div>
                </div>
                <!-- end -->

            </div>
        </div>
    </div>
    <!-- end -->
@endsection

@section("javaScript")

    <!--引入JS文件-->
    <script src="{{asset('js/cityModel.js')}}"></script>
    <script src="{{asset('js/payAddAddress.js')}}"></script>
    <script src="{{asset('js/pay.js')}}"></script>
@endsection
