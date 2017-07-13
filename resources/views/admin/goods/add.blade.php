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
<!-- ueditor -->
<script src="{{asset('./editor/ueditor.config.js')}}"></script>
<script src="{{asset('./editor/ueditor.all.min.js')}}"></script>

<!-- //ueditor -->
<style>
  .tips{ width: auto; height: 40px; line-height: 40px; font-size: 14px; color:red; font-style: '微软雅黑'}
</style>
</head>
<body>
<!-- @if (count(session('errors')) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<!-- {{dump(session())}} -->
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">

    <form method="post" id="form" class="form-x" action="{{url('/admin/goods_add')}}" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>  
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="goods_name"  />
          <div class="tips">{{$errors->first('goods_name')? $errors->first('goods_name') : ''}}</div>
        </div>
      </div>
        
      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <select name="typeid" class="input w50">
              <!-- <option value="0">请选择分类</option> -->
              @foreach($goodtypes as $val)
              <?php
                $m = substr_count($val['path'],",")-1;
                $nbsp = str_repeat("&nbsp;",$m*10);   
              ?>
              <option value="{{$val['id']}}">{{$nbsp."|--".$val['name']}}</option>
              @endforeach
            </select>
            <div class="tips">{{$errors->first('typeid')? $errors->first('typeid') : ''}}</div>
          </div>
        </div>
        
        <div class="form-group">
        <div class="label">
          <label>产品编号(sn)：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="goods_sn" value="" />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>商城价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="shop_price" value="" />
          <div class="tips">{{$errors->first('shop_price')? $errors->first('shop_price') : ''}}</div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>市场价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="mareket_price" value="" />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>成本价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="cost_price" value="" />
        </div>
      </div>
      
      <div class="upload_class" style="width:1000px; height:auto;">
          <div class="form-group">
          <div class="label">
            <label>图片：</label>
          </div>
          <div class="field">
            <input type="file" multiple="multiple" id="original_img" name="original_img[]" class="input " style="width:25%; float:left;"   data-toggle="hover" data-place="right" data-image="" />
            <input type="button" class="button bg-blue margin-left" name="add" value="+"  style="float:left;">
            <!-- <div class="tips">图片尺寸：500*500</div>   --> 
          </div>
        </div>
      </div>
        <!-- <div class="form-group">
          <div class="label">
            <label>其他属性：</label>
          </div>
          <div class="field" style="padding-top:8px;"> 
            首页 <input id="ishome"  type="checkbox" />
            推荐 <input id="isvouch"  type="checkbox" />
            置顶 <input id="istop"  type="checkbox" /> 
         
          </div>
        </div> -->
      </if>
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <script id="goods_remake" type="text/plain"  name="goods_remake" style="width:900px;height:200px;"></script>
          <!-- <textarea class="input" name="note" style=" height:90px;"></textarea> -->
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
        <script id="goods_content" type="text/plain"  name="goods_content" style="width:900px;height:300px;"></script>
          <!-- <textarea name="content" class="input" style="height:450px; border:1px solid #ddd;"></textarea> -->
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="clear"></div>

      <!-- <div class="form-group">
        <div class="label">
          <label>关键字标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_title" value="" />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>内容关键字：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_keywords" value=""/>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>关键字描述：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="s_desc" style="height:80px;"></textarea>
        </div>
      </div> -->

      <div class="form-group">
        <div class="label">
          <label>销售数量：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sales_num" value="0"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>是否上架：</label>
        </div>
        <div class="field">
          <input type="radio" class="" value="1" checked name="is_on_sale"/>是 
          <input type="radio" class="" value="0" name="is_on_sale"/>否
        </div>
        <div class="tips"></div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>是否推荐：</label>
        </div>
        <div class="field">
          <input type="radio" class="" checked name="is_recommend" value="1" />是 
          <input type="radio" class="" name="is_recommend" value="0" />否
        </div>
        <div class="tips"></div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>是否新品：</label>
        </div>
        <div class="field">
          <input type="radio" class="" checked name="is_new" value="1" />是
          <input type="radio" class="" name="is_new" value="0" />否
        </div>
        <div class="tips"></div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>是否热销：</label>
        </div>
        <div class="field">
          <input type="radio" class="" checked name="is_hot" value="1" />是
          <input type="radio" class="" name="is_hot" value="0" />否
        </div>
        <div class="tips"></div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>发布时间：</label>
        </div>
        <div class="field"> 
          <script src="{{asset('js/datejs/laydate.dev.js')}}"></script>
          <input type="text" class="laydate-icon input w50" id="datetime" name="datetime" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value=""  style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
          <div class="tips">{{$errors->first('created_at')? $errors->first('created_at') : ''}}</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>库存：</label>
        </div>
        <div class="field">
          <input type="number" class="input w50" name="store_count" value=""  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>点击次数：</label>
        </div>
        <div class="field">
          <input type="number" class="input w50" name="click_num" value="" data-validate="member:只能为数字"  />
          <div class="tips"></div>
        </div>
      </div>
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

</body></html>
<script>
      laydate({
            elem: '#datetime'
        });
      //实例化编辑器
      //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
      var ue = UE.getEditor('goods_remake');
      var ue = UE.getEditor('goods_content');

  $(function(){

      $('input[name=add]').click(function(){
          
        var html = "<div class='form-group'><div class='label'><label>图片：</label></div><div class='field'><input type='file' name='original_img[]' class='input tips' style='width:25%; float:left;'   data-toggle='hover' data-place='right' data-image='' /><input type='button' name='reduce' class='button bg-blue margin-left' value='-'  style='float:left;><div class='tipss'>图片尺寸：500*500</div></div></div>";
        $('.upload_class').append(html);

      });


     $(".upload_class").on('click','input[name=reduce]', function(){
          $(this).parent().parent().remove();
     });

  });
</script>
