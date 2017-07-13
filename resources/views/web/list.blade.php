@extends("web.master")
@section("title", "列表页")
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

    <!-- 左侧列表 -->
    <div class="container">
        <div class="col-md-3 column ui-sortable">
            <div class="panel panel-success z-depth-1">
                <div class="panel-heading">
                    <h5>
                        <i class="glyphicon glyphicon-th-list"></i>
                        商品分类
                    </h5>
                </div>
                <!-- <div class="glyphicon glyphicon-chevron-right"> -->
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked category-tree">
                        <li class="first active">
                            <a href="#">
                                <i class="glyphicon glyphicon-chevron-right"></i>
                                测试分类
                            </a>
                            <ul class="nav">
                                <li>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                </li>
                            </ul>
                        </li>

                        <li class="first active">
                            <a href="#">
                                <i class="glyphicon glyphicon-chevron-right"></i>
                                测试分类
                            </a>
                            <ul class="nav">
                                <li>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                </li>
                            </ul>
                        </li>

                        <li class="first active">
                            <a href="#">
                                <i class="glyphicon glyphicon-chevron-right"></i>
                                测试分类
                            </a>
                            <ul class="nav">
                                <li>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                </li>
                            </ul>
                        </li>

                        <li class="first active">
                            <a href="#">
                                <i class="glyphicon glyphicon-chevron-right"></i>
                                测试分类
                            </a>
                            <ul class="nav">
                                <li>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                </li>
                            </ul>
                        </li>

                        <li class="first active">
                            <a href="#">
                                <i class="glyphicon glyphicon-chevron-right"></i>
                                测试分类
                            </a>
                            <ul class="nav">
                                <li>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                    <a href="#" class="a2">测试子分类</a>
                                    <div class="nav3"></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-9 column ui-sortable">
            <div class="box box-element ui-draggable " style="ddisplay: block;margin-top:10px;"></div>
            <div class="row page-header">
                <div class="col-md-1">
                    <span class="tit">价格</span>
                </div>
                <div class="col-md-10">
                    <span class="item">所有</span>
                    <span class="item">0-100</span>
                    <span class="item">101-300</span>
                    <span class="item">301-500</span>
                    <span class="item">501-1000</span>
                    <span class="item">1001以上</span>
                </div>
            </div>
            <div class="row page-header">
                <div class="col-md-1">
                    <span class="tit">品牌</span>
                </div>
                <div class="col-md-10">
                    <span class="item">所有</span>
                    <span class="item">PHP</span>
                    <span class="item">JS</span>
                    <span class="item">NODEJS</span>
                    <span class="item">MYSQL</span>
                </div>
            </div>
            <div class="row page-header">
                <div class="col-md-1">
                    <span class="tit">颜色</span>
                </div>
                <div class="col-md-10">
                    <span class="item">所有</span>
                    <span class="item">红色</span>
                    <span class="item">红色</span>
                    <span class="item">红色</span>
                    <span class="item">红色</span>
                    <span class="item">红色</span>
                </div>
            </div>
            <div class="box box-element ui-draggable " style="ddisplay: block;margin-top:10px;"></div>
            <div class="page-header">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon sort-icon glyphicon-menu-up"></span>
                    价格
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon sort-icon glyphicon-menu-up"></span>
                    时间
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon sort-icon glyphicon-menu-up"></span>
                    排序值
                </button>
            </div>
            <!-- 商品 -->
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="thumbnail" style="height: 336px;">
                        <a href=""><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                        <div class="caption">
                            <h4>
                                <div class="textoverflow">
                                    <a href="" target="_blank">Bootstrap 编码规范</a>
                                </div>
                                <br>
                                <p align="center">100.00</p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="thumbnail" style="height: 336px;">
                        <a href=""><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                        <div class="caption">
                            <h4>
                                <div class="textoverflow">
                                    <a href="" target="_blank">Bootstrap 编码规范</a>
                                </div>
                                <br>
                                <p align="center">100.00</p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="thumbnail" style="height: 336px;">
                        <a href=""><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                        <div class="caption">
                            <h4>
                                <div class="textoverflow">
                                    <a href="" target="_blank">Bootstrap 编码规范</a>
                                </div>
                                <br>
                                <p align="center">100.00</p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="thumbnail" style="height: 336px;">
                        <a href=""><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                        <div class="caption">
                            <h4>
                                <div class="textoverflow">
                                    <a href="" target="_blank">Bootstrap 编码规范</a>
                                </div>
                                <br>
                                <p align="center">100.00</p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="thumbnail" style="height: 336px;">
                        <a href=""><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                        <div class="caption">
                            <h4>
                                <div class="textoverflow">
                                    <a href="" target="_blank">Bootstrap 编码规范</a>
                                </div>
                                <br>
                                <p align="center">100.00</p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="thumbnail" style="height: 336px;">
                        <a href=""><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                        <div class="caption">
                            <h4>
                                <div class="textoverflow">
                                    <a href="" target="_blank">Bootstrap 编码规范</a>
                                </div>
                                <br>
                                <p align="center">100.00</p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="thumbnail" style="height: 336px;">
                        <a href=""><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                        <div class="caption">
                            <h4>
                                <div class="textoverflow">
                                    <a href="" target="_blank">Bootstrap 编码规范</a>
                                </div>
                                <br>
                                <p align="center">100.00</p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="thumbnail" style="height: 336px;">
                        <a href=""><img src="./images/1.jpg" alt="" style="height:250px;"></a>
                        <div class="caption">
                            <h4>
                                <div class="textoverflow">
                                    <a href="" target="_blank">Bootstrap 编码规范</a>
                                </div>
                                <br>
                                <p align="center">100.00</p>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end -->
        </div>
    </div>
    </div>
    <!-- end -->
@endsection
