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
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="{{url('admin/link_upadds')}}" id="link_add">
            {!! csrf_field() !!}
            <input type="hidden" name="linkid" value="{{$upadd['id']}}">
            <div class="form-group">
                <div class="label">
                    <label>友链名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="linkname" id="linkname" value="{{$upadd['name']}}"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>友链地址：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="link" id="link" value="{{$upadd['url']}}"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit" id="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script>

    var submit = document.getElementById('submit');
    submit.onclick = function () {
        var name = document.getElementById('linkname').value;
        var link = document.getElementById('link').value;

        if(name == null || name == ""){
            alert("友链名称不能为空");
            return false;
        }

        if(link == null || link == ""){
            alert("友链地址不能为空");
            return false;
        }

        if (!(/(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/.test(link))) {
            alert("请输入正确的友链地址");
            return false;
        }
    }

</script>
