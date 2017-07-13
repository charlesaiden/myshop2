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
    <form method="post" class="form-x" action="{{url('admin/cate_edit')}}" id="add_cate">
    {!! csrf_field() !!}
      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select name="tpid" id="tpid" class="input w50">
            <option <?php echo $pid==0? 'selected':'' ?> value="0">顶级分类</option>
            @if($types)
              @foreach($types as $val)
              <?php
                $m = substr_count($val['path'],",")-1;
                $nbsp = str_repeat("&nbsp;",$m*10);   
              ?>
                <option <?php echo $pid==$val['id']? 'selected':'' ?> value="{{$val['id']}}">{{$nbsp."|--".$val['name']}}</option>
              @endforeach
            @endif
          </select>
          <div class="tips">不选择上级分类默认为一级分类</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类标题：</label>
        </div>
        <div class="field">
          <input type="hidden" class="input w50" name="id" value="{{$id}}" id="id" />
          <input type="text" class="input w50" name="title" value="{{$name}}" id="title" />
          <div class="tips"></div>
        </div>
      </div>
      
      @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
<script>

  // $(function(){
  //     $('button').click(function(){
  //         var pid = $('#pid').val();
  //         var path = $("#pid").find("option:selected").attr("path");
  //         var name = $("#title").val();
  //         // alert(pid+'--'+path+'--'+title);
  //         var data = $("#add_cate").serialize();
  //         console.log(data)
  //         // return;
  //         $.ajax({
  //           url:'/admin/cate_add',
  //           type:'post',
  //           dataType:"JSON",
  //           // name=John&location=Boston
  //           // data:'pid='+ pid +'&path='+path+'&name='+name,
  //           data:data,
  //           success:function(msg){
  //               console.log(msg);
  //           }
  //         });


  //     });
  // });
</script>
