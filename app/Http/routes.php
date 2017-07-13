<?php

	//引入前台路由
	include_once("WebRoute.php");

	Route::get('/admin/login', 'BackUserController@login');//后台登录,不要放入路由组
	Route::post('/admin/dologin', 'BackUserController@dologin');//后台登录,不要放入路由组
	Route::get('welcome', 'BackUserController@welcome');//无权限
	Route::get('captcha/mews','BackUserController@mews');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {

	// echo config('app.timezone');
	// dd($_ENV);
    // return view('welcome');
// });

//######################前台#################################

//######################后台#################################
Route::get('/admin/goods_add', 'GoodController@add');
Route::post('/admin/goods_add','GoodController@doAdd');

Route::group(['middleware'=>['web','admin.login']],function(){


	include_once("AdminRoute.php");//后台用户登录路由

	Route::get('/admin', 'AdminController@index');

	//网站设置页
	Route::get('/admin/info', 'AdminController@info');
	//用户模块

	//商品分类模块
	Route::get('/admin/cate_list', 'AdminController@cate_list');
	Route::get('/admin/cate_add', 'AdminController@cate_add');
	Route::post('/admin/cate_add','AdminController@doCateAdd');
	Route::get('/admin/cate_edit/{id}/{pid}/{name}', 'AdminController@cate_edit');
	Route::post('/admin/cate_edit/','AdminController@doCateEdit');
	Route::get('/admin/cate_del/{id}', 'AdminController@cate_del');
	Route::get('/admin/cate_child/{id}/{pid}', 'AdminController@cate_child');
	Route::post('/admin/cate_child', 'AdminController@doCateChild');

	//商品模块
	Route::get('/admin/goods_list', 'GoodController@index');
	// Route::post('/admin/goods_list', 'GoodController@index');
	 Route::get('/admin/edit/{id}',[
 		'as'=>'aedit',
 		'edit'=>'AdminController@edit'
 	]);

	// Route::post('/admin/goods_list', [
	// 	'as'=>'/admin/New',
	// 	'changeNew'=>'GoodController@changeNew'
	// ]);
	Route::post('/admin/goods_list/{new}', 'GoodController@changeNew');
	// Route::post('/admin/goods_list', [
	// 	'as'=>'changeHot',
	// 	'changeHot'=>'GoodController@changeHot'
	// ]);
	Route::post('/admin/goods_list/{hot}/{tid}', 'GoodController@changeHot');

	// 	Route::post('/admin/goods_list', [
	// 	'as'=>'changeRecommend',
	// 	'changeRecommend'=>'GoodController@changeRecommend'
	// ]);
	Route::post('/admin/goods_list/{recommend}/{pid}/{tid}', 'GoodController@changeRecommend');

	Route::post('/admin/goods_list/{sale}/{pid}/{tid}/{kid}', 'GoodController@changeSale');

	Route::get('/admin/goods_edit/{id}', 'GoodController@edit');
	Route::post('/admin/goods_edit', 'GoodController@doEdit');
	// Route::post('/admin/goods_addimg', 'GoodController@addEditImg');
	Route::post('/admin/goods_delimg', 'GoodController@delEditImg');
	Route::get('/admin/goods_del/{id}', 'GoodController@del');

	//订单模块
	Route::get('/admin/order_list', 'AdminController@order_list');
	Route::post('/admin/order_update', 'AdminController@order_update');
	Route::get('/admin/order_edit/{id}', 'AdminController@order_edit');
	Route::get('/admin/order_del', 'AdminController@order_del');

	Route::get('/admin/order_send/{id}', 'AdminController@order_send');
	Route::get('/admin/send', 'AdminController@send');

	// Route::get('/admin/order_send', 'AdminController@order_send');
	// Route::get("/admin/send", "AdminController@send");


    //评论模块
    Route::get('/admin/comments_list', 'AdminController@comments_list');
    Route::get('/admin/comments_add', 'AdminController@comments_add');
    Route::post('/admin/comments_add', 'AdminController@comments_submit');

    //友情链接
    Route::get('/admin/link_list', 'AdminController@link_list');
    Route::get('/admin/link_add', 'AdminController@link_add');
    Route::post('/admin/link_add', 'AdminController@link_submit');
    Route::get('/admin/link_updata', 'AdminController@link_updata');
    Route::get('/admin/link_upadd', 'AdminController@link_upadd');
    Route::post('/admin/link_upadds', 'AdminController@link_upadds');
});

Route::group(['middleware'=>['web','admin.login','level']],function(){

	//管理员
	Route::get('/admin/admin_add/', 'AdminController@admin_add');
	Route::post('/admin/admin_add/', 'AdminController@doAdminAdd');
	Route::get('/admin/admin_list', 'AdminController@admin_list');
	Route::get('/admin/admin_edit/{id}', 'AdminController@admin_edit');
	Route::post('/admin/admin_edit/', 'AdminController@doAdminEdit');
	Route::get('/admin/admin_del/{id}', 'AdminController@admin_del');
});






// Route::get('/admin', 'AdminController@index');
// Route::get('/admin', 'AdminController@index');
// Route::get('/admin', 'AdminController@index');
// Route::get('/admin', 'AdminController@index');
//Route::get('/Admin/login', 'AdminController@login');//后台登录
//Route::post('/Admin/login', 'AdminController@login');//后台登录处理



// Route::get('/user/{id}', function($id){
// 	dump($id);
// });

// Route::get('/user/{id}/commit/{c_id?}', function($id ,$c_id=null){
// 	return $id."---".$c_id;
// });


// Route::get('/page/{num?}' ,function($num=1){
// 	return $num;
// });

// Route::get('/page/{num?}', function($num=1){

// })->where('num','[0-9]+');

// Route::get('page/{name?}', function($name='type'){

// })->where('name','[a-zA-Z]+');

 // Route::get('pro', 'ProController@index')->name('p');

 // Route::get('/pro/{id}','ProController@index');
//---------------前台
 // Route::get('/home/','HomeController@index');
//---------------后台
 // Route::get('/admin/','AdminController@index');
//添加
 // Route::get('/admin/add','AdminController@add');
//修改
 // Route::get('/admin/edit/{id}',[
 // 		'as'=>'aedit',
 // 		'edit'=>'AdminController@edit'
 // 	]);
//删除
// Route::get('/admin/delete','AdminController@delete');
//登录
// Route::get('/admin/login/','AdminController@login');

//处理登录
// Route::post('/admin/dologin','AdminController@dologin');

// 127.0.0.1   localhost localhost.localdomain localhost4 localhost4.localdomain4
// ::1         localhost localhost.localdomain localhost6 localhost6.localdomain6

// Route::get('/pro','ProController@index');
