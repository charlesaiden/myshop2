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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加轮播图</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="{{url('/admin/pic_insert')}}" enctype="multipart/form-data">
      <input type="hidden" name="created_at" value="{{date('YmdHis',time())}}">
      <div class="form-group">
        <div class="label">
          <label>名字：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="name" data-validate="required:请输入名字" />
          <div class="tips"></div>
        </div>
      </div>
     
     <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="file" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""  data-toggle="hover" data-place="right" data-image="" />
          <!-- <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;"> -->
          <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div>
      
      <if condition="$iscid eq 1">

        <div class="form-group">
          <div class="label">
            <label>URL：</label>
          </div>
          <div class="field">
            <input type="text" class="input w50" value="" name="url" data-validate="required:URL" />
            <div class="tips"></div>
          </div>
        </div>

      </if>

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
