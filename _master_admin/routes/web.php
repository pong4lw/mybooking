<?php
Auth::routes();

//Route::group(['middleware' => 'auth:admin'], function(){
	Route::view('admin/login','admin.auth.login')->name('admin.login');
	Route::get('admin/login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');

	Route::get('logout','Admin\Auth\LoginController@logout')->name('logout');
	Route::post('logout','Admin\Auth\LoginController@logout')->name('logout');

	Route::get('admin/', 'AdminController@index');

	Route::get('admin/user', 'Admin\UserController@userlist');
	Route::get('admin/user/{id}', 'Admin\UserController@user');
	Route::post('admin/user/{id}', 'Admin\UserController@user');

	Route::get('admin/userupdate/{id}', 'Admin\UserController@userupdate');
	Route::post('admin/userupdate/{id}', 'Admin\UserController@userupdate');

	Route::get('admin/userupdate/', 'Admin\UserController@userupdate');
	Route::post('admin/userupdate/', 'Admin\StaffController@userupdate');

	Route::get('admin/staff', 'Admin\StaffController@stafflist');
	Route::get('admin/staffs', 'Admin\StaffController@stafflist');
	Route::post('admin/staffs', 'Admin\StaffController@stafflist');


	Route::get('admin/staff/upload/{id}', 'Admin\StaffController@upload');
	Route::post('admin/staff/upload/{id}', 'Admin\StaffController@upload');


	Route::post('admin/staff/addmail', 'Admin\StaffController@staffaddmail');

	Route::get('admin/staff/add', 'Admin\StaffController@staffadd');

	Route::get('admin/staff/{id}', 'Admin\StaffController@staff');
	Route::post('admin/staff/{id}', 'Admin\StaffController@staff');

	Route::get('admin/staffupdate/', 'Admin\StaffController@staffupdate');
	Route::post('admin/staffupdate/', 'Admin\StaffController@staffupdate');

	Route::get('admin/staffupdate/{id}', 'Admin\StaffController@staffupdate');
	Route::post('admin/staffupdate/{id}', 'Admin\StaffController@staffupdate');

	Route::get('admin/schedule', 'Admin\PlanController@schedule');
	Route::post('admin/schedule', 'Admin\PlanController@schedule');

	Route::get('admin/services', 'Admin\ServiceController@index');
	Route::post('admin/services', 'Admin\ServiceController@index');

	Route::get('admin/services/{id}/', 'Admin\ServiceController@service');
	Route::post('admin/services/{id}/', 'Admin\ServiceController@service');

	Route::get('admin/services/create', 'Admin\ServiceController@create');
	Route::post('admin/services/create', 'Admin\ServiceController@create');

	Route::get('admin/services/update/{id?}/', 'Admin\ServiceController@update');
	Route::post('admin/services/update/{id?}/', 'Admin\ServiceController@update');

	Route::get('admin/plan/create', 'Admin\PlanController@create');
	Route::get('admin/plan/edit/{id?}', 'Admin\PlanController@edit');

	Route::get('admin/plan/update/{id?}/', 'Admin\PlanController@update');
	Route::post('admin/plan/update/{id?}/', 'Admin\PlanController@update');

	Route::get('admin/reservation', 'AdminController@reservation');

	Route::get('admin/','AdminController@index');

	Route::get('admin/notification','AdminController@notification');

	Route::get('admin/help', 'Admin\SettingController@index');
	Route::post('admin/help', 'Admin\SettingController@index');

	Route::get('admin/setting', 'Admin\SettingController@index');
	Route::post('admin/setting', 'Admin\SettingController@index');

	Route::get('admin/setting/update', 'Admin\SettingController@update');
	Route::post('admin/setting/update', 'Admin\SettingController@update');

	Route::get('admin/setting_time', 'Admin\SettingController@time');
	Route::post('admin/setting_time', 'Admin\SettingController@time');

	Route::get('admin/settings_time/update', 'Admin\SettingController@timeupdate');
	Route::post('admin/settings_time/update', 'Admin\SettingController@timeupdate');


//});