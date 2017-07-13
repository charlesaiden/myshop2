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
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改用户</strong></div>
    <div class="body-content">

        <form method="post" class="form-x" action="{{url('/admin/update/'.$data->id)}}">
            <div class="form-group">
                <div class="label">
                    <label>登录账户：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="{{$data->username}}" name="username" data-validate="required:请输入账号" />
                    <div class="tips"></div>
                </div>
            </div>
<!--             <div class="form-group">
                <div class="label">
                    <label>密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" value="{{$data->pass}}" name="pass" data-validate="required:请设置密码" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>确认密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" value="" name="pass" data-validate="required:请再次输入确认密码" />
                    <div class="tips"></div>
                </div>
            </div> -->
         <!--  <div class="form-group">
            <div class="label">
            <label>图片：</label>
            </div>
           <div class="field">
            <input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""  data-toggle="hover" data-place="right" data-image="" />
           <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
            <div class="tipss">图片尺寸：500*500</div>
           </div>
            </div> -->

            <!-- <if condition="$iscid eq 1">
                <div class="form-group">
                    <div class="label">
                        <label>性别：</label>
                    </div>
                    <div class="field">
                        <select name="sex" class="input w50" value="{{$data->sex}}">
                            <option value="0">男</option>
                            <option value="1">女</option>
                        </select>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>邮箱：</label>
                    </div>
                    <div class="field">
                        <input type="email" class="input w50" value="{{$data->email}}" name="email" data-validate="required:请输入邮箱" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>电话：</label>
                    </div>
                    <div class="field">
                        <input type="number" class="input w50" value="{{$data->phone}}" name="phone" data-validate="required:请输入电话" />
                        <div class="tips"></div>
                    </div>
                </div> -->
                <div class="form-group">
                    <div class="label">
                        <label>状态：</label>
                    </div>
                    <div class="field">
                        <select name="state" class="input w50">
                            <option value="0">禁用</option>
                            <option value="1">普通</option>
                            <option value="2">管理员</option>
                        </select>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>等级：</label>
                    </div>
                    <div class="field">
                        <select name="level" class="input w50">
                            <option value="1">一级</option>
                            <option value="2">二级</option>
                        </select>
                        <div class="tips"></div>
                    </div>
                </div>
            </if>
            <!-- <div class="form-group">
                <div class="label">
                    <label>地址：</label>
                </div>
                <div class="field">
                    <input class="input" name="address" value="{{$data->address}}" style=" height:90px;"></input>
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>邮编：</label>
                </div>
                <div class="field">
                    <input type="number" class="input w50" value="{{$data->code}}" name="code" data-validate="required:请输入邮编" />
                    <div class="tips"></div>
                </div>
            </div> -->
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
