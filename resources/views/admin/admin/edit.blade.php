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
  <div class="panel-head"><strong><span class="icon-key"></span> 添加管理员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="{{url('/admin/admin_edit')}}">
    <?php echo csrf_field(); ?>
      <div class="form-group">
        <!-- <div class="label">
          <label for="sitename">管理员帐号：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
           admin
          </label>
        </div> -->
      </div>   
      <div class="form-group">
          <div class="label">
            <label>管理员等级：</label>
          </div>
          <div class="field">
            <select name="level" class="input w50">
              <option <?php echo $user_data['level']==0? 'selected':'' ?> value="0">超级管理员</option>
              <option <?php echo $user_data['level']==1? 'selected':'' ?> value="1">一般管理员</option>
              <option <?php echo $user_data['level']==2? 'selected':'' ?> value="2">录入管理员</option>
              <option <?php echo $user_data['level']==3? 'selected':'' ?> value="3">审核管理员</option>
            </select>
            <div class="tips"></div>
          </div>
        </div>   
      <div class="form-group">
        <div class="label">
          <label for="sitename">管理员账号：</label>
        </div>
        <div class="field">
          <input type="hidden" value="{{$user_data['id']}}" class="input w50" id="id" name="id" size="50" placeholder="请输入账号" data-validate="required:请输入账号" /> 
          <input type="text" value="{{$user_data['username']}}" class="input w50" id="username" name="username" size="50" placeholder="请输入账号" data-validate="required:请输入账号" />       
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">密码：</label>
        </div>
        <div class="field">
          <input type="password" value="{{$user_data['pass']}}" class="input w50" id="pass" name="pass" size="50" placeholder="请输入新密码" data-validate="required:请输入密码,length#>=5:密码不能小于5位" />         
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
