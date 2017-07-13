<?php

/*
 * 前台路由
 */

//首页
Route::get("/","GoodController@web_index");
Route::get("index","GoodController@web_index");

//首页分类
Route::get("type/{id}","WebController@type");

//登录页
Route::get("login", "WebController@login");

//注册页
Route::get("register", "WebController@register");

//商品详情页
Route::get("goods/{goods_id}", "WebController@goods");
// Route::get("detail/{id}", "GoodController@webDetail");

//购物车页
Route::get("cart", "WebController@cart");

//结算页
Route::get("pay/{id?}/{goodnum?}", "WebController@pay");

//结算成功页
Route::get("paysucceed", "WebController@paysucceed");

//分类列表页
Route::get("cat_list/{pid}", "GoodController@cat_list");
//商品列表页
Route::get("cat_list/list/{pid}", "GoodController@lister");

//订单页
Route::get("order", "WebController@order");
Route::get("myorder", "WebController@myorder");

//用户中心页
Route::get("center", "WebController@ucenter");
Route::post("center", "WebController@ucenteradd");

//地址管理页
Route::get("addres", "WebController@addres");
Route::post("addres", "WebController@addresadd");
Route::get("addresedat/{id}", "WebController@addresedit");
Route::post("addresedat", "WebController@addreseditadd");

//评论管理
Route::get("message", "WebController@message");
Route::post("message", "WebController@messageadd");

//注册页ajax请求地址
Route::post("registerAjax", "WebController@registerAjax");

//登录页ajax请求地址
Route::post("loginAjax", "WebController@loginAjax");

//用户退出
Route::get("quit", "WebController@quit");


//城市三级联动
Route::get("cityModel", "WebController@cityModel");

//支付页添加地址
Route::post("payAddress", "WebController@payAddress");

//邮箱
Route::get("activation/{id}", "WebController@activation");

//找回密码
Route::get("Retrieve","WebController@Retrieve");
Route::post("Retrieve","WebController@Retrieveajax");
Route::post("Retrievepass","WebController@Retrievepass");
Route::get("changepass/{id}/{time}","WebController@changepass");
Route::post("changepass","WebController@changepassword");

//购物车页ajax
Route::get("cartAjax/{id}/{gnum}", "WebController@cartAjax");

//购物车删除
Route::get("cartDelete", "WebController@cartDelete");

//购物车结算存session
Route::get("cartSession", "WebController@cartSession");
Route::get("paysucceedAjax", "WebController@paysucceedAjax");