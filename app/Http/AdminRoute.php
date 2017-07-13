<?php

	//用户模块
Route::get('/admin/user_list', 'BackUserController@user_list');
Route::get('/admin/user_add', 'BackUserController@user_add');
Route::get('/admin/user_edit/{id}', 'BackUserController@user_edit');
Route::post('/admin/update/{id}', 'BackUserController@update');
Route::post('/admin/insert', 'BackUserController@insert');
Route::get('/admin/user_del/{id}', 'BackUserController@user_del');
Route::post('/admin/search','BackUserController@search');

	//登录
// Route::get('/admin/login', 'BackUserController@login');
// Route::post('/admin/dologin', 'BackUserController@dologin');

	//退出登录
Route::get('/admin/logout','BackUserController@logout');


//控制管理员
// Route::get('/admin/competence', 'BackUserController@competence');
// Route::get('/admin/competence_add', 'BackUserController@competence_add');//编辑添加权限 

//轮播图
Route::get('/admin/pic','BackUserController@pic_add');
Route::post('/admin/pic_insert','BackUserController@pic_insert');
Route::get('/admin/pic_list','BackUserController@pic_list');
Route::post('/admin/{id}/pic_del/','BackUserController@pic_del');
