<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="{{asset('style/css/pintuer.css')}}">
    <link rel="stylesheet" href="{{asset('style/css/admin.css')}}">
    <script src="{{asset('style/js/jquery.js')}}"></script>
    <script src="{{asset('style/js/pintuer.js')}}"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <table class="table table-hover text-center">

        <tr>
            <th width="5%">ID</th>
            <th width="15%">订单ID</th>
            <th width="10%">商品名称</th>
            <th width="10%">用户ID</th>
            <th width="10%">状态</th>
            <th width="15%">操作</th>
        </tr>
        @if($data)
        @foreach($data as $v)
                <tr>
                    <td>{{$v['id']}}</td>
                    <td>{{$v['orderid']}}</td>
                    <td>{{$v['goods_name']}}</td>
                    <td>{{$v['userid']}}</td>
                    <td>
                        @if($v['content'] == 0)
                            待审核
                        @elseif($v['content'] == 1)
                            审核通过
                        @else
                            审核不通过
                        @endif
                    </td>
                    <td><div class="button-group">
                            <a class="button border-main" href="{{url('admin/comments_add')}}?id={{$v['id']}}"><span class="icon-edit"></span> 审核</a>
                        </div>
                    </td>
                </tr>
        @endforeach
        @endif
    </table>
</div>
<div class="pagelist">
{{--<a href="">上一页</a>--}}
    {{--<span class="current">1</span>--}}
    {{--<a href="">2</a>--}}
    {{--<a href="">3</a><a href="">下一页</a>--}}
    {{--<a href="">尾页</a>--}}
    {{$page->links()}}
</div>
</body>
</html>
