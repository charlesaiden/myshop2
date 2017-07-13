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
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加用户</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="{{url('admin/comments_add')}}">
            <input type="hidden" name="comments_id" value="{{$add['id']}}">
        <!--       {{--<div class="form-group">--}}
        {{--<div class="label">--}}
        {{--<label>图片：</label>--}}
        {{--</div>--}}
        {{--<div class="field">--}}
        {{--<input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""  data-toggle="hover" data-place="right" data-image="" />--}}
        {{--<input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">--}}
        {{--<div class="tipss">图片尺寸：500*500</div>--}}
        {{--</div>--}}
        {{--</div>--}} -->
            {{--{{var_dump($add)}}--}}

            <div class="form-group">
                <div class="label">
                    <label>评论内容：</label>
                </div>
                <div class="field">
                    <input class="input" name="address" style=" height:90px;" value="{{$add['message']}}" readonly>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>状态：</label>
                </div>
                <div class="field">
                    <select name="state" class="input w50">
                        @if($add['content'] == 0)
                            <option value="0">待审核</option>
                            <option value="1">审核通过</option>
                            <option value="2">审核不通过</option>
                        @elseif($add['content'] == 1)
                            <option value="1">审核通过</option>
                            <option value="2">审核不通过</option>
                        @else
                            <option value="2">审核不通过</option>
                            <option value="1">审核通过</option>
                        @endif
                    </select>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    {{csrf_field()}}
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body></html>
