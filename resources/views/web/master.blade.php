<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @yield("meta")
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/list.css')}}">
</head>
<body>

<!-- 导航 -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li class="hidden-sm hidden-md">

                <li><a href="{{url('index')}}" target="_blank">首页</a></li>
                <li><a href="{{url('cart')}}" target="_blank">购物车</a></li>
                <li><a href="{{url('center')}}" target="_blank">用户中心</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right hidden-sm">

                @if(session('webusername') == "")
                    <li><a href="{{url('login')}}">登录</a></li>
                    <li><a href="{{url('register')}}">注册</a></li>
                    @else
                    <li><a>欢迎您: {{session('webusername')}}</a></li>
                   <li> <a href="{{url('quit')}}">退出</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- end -->

@yield('content')

<!--友情链接上的图片-->
<div class="container">
    <div class="bq-img"><img src="{{asset('images/bq-nav.png')}}" alt="" class="img-responsive"></div>
</div>
<!--end-->
<?php
    $list = DB::table('links')->get();
?>
<!-- 友情链接 -->

<div class="container">
    <div class="links">
        <div class="links-font">友情链接</div>
        <ul>
            @if($list)
                @foreach($list as $url)
                    <li><a href="{{$url['url']}}">{{$url['name']}}</a></li>
                @endforeach
            @endif
        </ul>
        <hr>
    </div>
</div>
<!-- end -->

<div class="copyright">
    <div class="container">
        <div class="copyright-font">本站相关网页素材及相关资源均来源互联网，如有侵权请速告知，我们将会在24小时内删除</div>
</div>
</div>
</body>
</html>
<script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('javaScript')
