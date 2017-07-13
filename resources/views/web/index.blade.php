@extends("web.master")
@section("title", "商城首页")
@section("content")
    <!-- 幻灯片 -->
    <div class="box box-element ui-draggable" style="display: block; margin-top:52px;">
    

        <div class="view">

            <div class="carousel slide" id="carousel-933681">
                <ol class="carousel-indicators">
                    <li class="" data-slide-to="0" data-target="#carousel-933681"></li>
                    <li data-slide-to="1" data-target="#carousel-933681" class=""></li>
                    <li data-slide-to="2" data-target="#carousel-933681" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img alt="" src="{{url('http://ibootstrap-file.b0.upaiyun.com/lorempixel.com/1600/500/sports/1/default.jpg')}}">
                        <div class="carousel-caption">
                            <h4>First Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img alt="" src="{{url('http://ibootstrap-file.b0.upaiyun.com/lorempixel.com/1600/500/sports/2/default.jpg')}}">
                        <div class="carousel-caption">
                            <h4>Second Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                    <div class="item active">
                        <img alt="" src="{{url('http://ibootstrap-file.b0.upaiyun.com/lorempixel.com/1600/500/sports/3/default.jpg')}}">
                        <div class="carousel-caption">
                            <h4>Third Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div>

                <a class="left carousel-control" href="#carousel-933681" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-933681" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>

        </div>
    </div>
    <!-- end -->

    <!-- 最新商品 -->
    <div class="container">
        <div class="snav-margin">
            <div class="snav-lfont">最新商品</div>
            <div class="snav-rfont"><a href="{{url('list')}}">更多></a></div>
        </div>
    </div>
    <!-- end -->

    <!-- 商品 -->
    <div class="container">
        <div class="row">

        @foreach($user as $v)
           
            <div class="col-sm-6 col-md-4 col-lg-3 ">
                <div class="thumbnail" style="height: 336px;">
                    <a href="{{url('goods/'.$v['goods_id'])}}"><img src="{{asset('images/1.jpg')}}" alt="" style="height:250px;"></a>
                    <div class="caption">
                        <h4>
                        
                            <div class="textoverflow">
                                <a href="{{url('goods/'.$v['goods_id'])}}" target="_blank">{{$v['goods_name']}}</a>
                            </div>
                            <br>
                            <p align="center">{{$v['shop_price']}}</p>
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- end -->

    <!-- 热卖商品 -->
    <div class="container">
        <div class="snav-green">
            <div class="snav-lfont">热卖商品</div>
            <div class="snav-rfont"><a href="{{url('list')}}">更多></a></div>
        </div>
    </div>
    <!-- end -->

    <!-- 商品 -->
    <div class="container">
        <div class="row">

            @foreach($hotsale as $a)
            <div class="col-sm-6 col-md-4 col-lg-3 ">
                <div class="thumbnail" style="height: 336px;">
                    <a href="{{url('goods/'.$a['goods_id'])}}"><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                    <div class="caption">
                        <h4>
                            <div class="textoverflow">
                                <a href="{{url('goods/'.$a['goods_id'])}}" target="_blank">{{$a['goods_name']}}</a>
                            </div>
                            <br>
                            <p align="center">{{$a['shop_price']}}</p>
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end -->
@endsection


