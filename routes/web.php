<?php
Auth::routes();

Route::view('login','auth.login');

Route::group(['prefix' => 'user'], function(){	
	Auth::routes();
});

Route::get('admin', 'Admin\Auth\LoginController@login');
Route::view('admin/login','admin.auth.login');

Route::group(['middleware' => 'auth:admin'], function(){
	Route::get('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
	Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
	Route::get('admin/login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');

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

	Route::post('admin/staff/addmail', 'Admin\StaffController@staffaddmail');

	Route::get('admin/staff/add', 'Admin\StaffController@staffadd');

	Route::get('admin/staff/{id}', 'Admin\StaffController@staff');
	Route::post('admin/staff/{id}', 'Admin\StaffController@staff');

	Route::get('admin/staffupdate/', 'Admin\StaffController@staffupdate');
	Route::post('admin/staffupdate/', 'Admin\StaffController@staffupdate');

	Route::get('admin/staffupdate/{user_id}', 'Admin\StaffController@staffupdate');
	Route::post('admin/staffupdate/{user_id}', 'Admin\StaffController@staffupdate');

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
});

Route::group(['middleware' => 'auth:web'], function(){
	Route::get('/', 'UserController@index');
	Route::get('/home', 'UserController@index');
	Route::get('user', 'UserController@index');

	Route::get('login', 'Auth\LoginController@login')->name('login');
	Route::post('login', 'Auth\LoginController@login')->name('login');

	Route::get('user/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('user/logout', 'Auth\LoginController@logout')->name('logout');


//ダッシュボード
	Route::get('user/index', 'UserController@index');

//新規予約	
	Route::get('user/reservation', 'UserController@reservation');
	Route::get('user/reservation_conform', 'UserController@reservation_conform');
	Route::get('user/reservation_comp', 'UserController@reservation_comp');

	Route::post('user/reservation', 'UserController@reservation');
	Route::post('user/reservation_conform', 'UserController@reservation_conform');

	Route::get('user/ticketadd', 'UserController@ticketadd');
	Route::post('user/ticketadd', 'UserController@ticketadd');

	Route::get('user/ticketuse', 'UserController@ticketuse');
	Route::post('user/ticketuse', 'UserController@ticketuse');

//予定確認
	Route::get('user/schedule', 'UserController@schedule');
	Route::get('user/schedule_update', 'UserController@reservation_update');
	Route::get('user/schedule_change', 'UserController@reservation_change');

	Route::get('user/schedule_update_conform', 'UserController@reservation_update_conform');

	Route::get('user/schedule_cancel', 'UserController@reservation_cancel');
	Route::get('user/schedule_cancel_conform', 'UserController@reservation_cancel_conform');

	Route::get('user/schedule_delete/{$id}', 'UserController@reservation');

	Route::get('user/reservation_conform/{$id}', 'UserController@reservation_conform');

//チケット
	Route::get('user/product', 'UserController@product');

//設定
	Route::get('user/setting', 'UserController@setting');
	Route::get('user/setting_update', 'UserController@setting_update');

	Route::get('user/setting_confort', 'UserController@setting_confort');

	Route::get('user/setting/mail', 'UserController@settingmail');
	Route::get('user/setting/mail_update', 'UserController@settingmail_update');

	Route::get('user/setting/mail_confort', 'UserController@settingmail_confort');

	Route::get('user/setting/password', 'UserController@setting_password');
	Route::get('user/setting/password_update', 'UserController@setting_password_update');
	Route::get('user/setting/password_confort', 'UserController@setting_password_confort');

	Route::get('user/setting/receive', 'UserController@settingreceive');
	Route::get('user/setting/receive_confort', 'UserController@settingreceive_confort');

	Route::post('user/setting/receive', 'UserController@settingreceive');
	Route::post('user/setting/receive_confort', 'UserController@settingreceive_confort');
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
	Route::resetPassword();
	Route::emailVerification();
});

Route::get('/', 'Site\SiteController@index')->name('site');
Route::view('login', 'auth.login');

Route::group(['prefix' => 'user'], function(){
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login');
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
	Route::resetPassword();
	Route::emailVerification();
});

Route::group(['middleware' => 'auth:web'], function(){
	Route::get('/', 'UserController@index');
	Route::get('/home', 'UserController@index');

	Route::get('/user', 'UserController@index');
//ダッシュボード
	Route::get('/user/index', 'UserController@index');

//新規予約	
	Route::get('/user/reservation', 'UserController@reservation');
	Route::get('/user/reservation_conform', 'UserController@reservation_conform');
	Route::get('/user/reservation_comp', 'UserController@reservation_comp');

	Route::post('/user/reservation', 'UserController@reservation');
	Route::post('/user/reservation_conform', 'UserController@reservation_conform');

	Route::get('/user/ticketadd', 'UserController@ticketadd');
	Route::post('/user/ticketadd', 'UserController@ticketadd');

	Route::get('/user/ticketuse', 'UserController@ticketuse');
	Route::post('/user/ticketuse', 'UserController@ticketuse');

//予定確認
	Route::get('/user/schedule', 'UserController@schedule');
	Route::get('/user/schedule_update', 'UserController@reservation_update');
	Route::get('/user/schedule_change', 'UserController@reservation_change');

	Route::get('/user/schedule_update_conform', 'UserController@reservation_update_conform');

	Route::get('/user/schedule_cancel', 'UserController@reservation_cancel');
	Route::get('/user/schedule_cancel_conform', 'UserController@reservation_cancel_conform');

	Route::get('/user/schedule_delete/{$id}', 'UserController@reservation');

	Route::get('/user/reservation_conform/{$id}', 'UserController@reservation_conform');

//チケット
	Route::get('/user/product', 'UserController@product');

//設定
	Route::get('/user/setting', 'UserController@setting');
	Route::get('/user/setting_update', 'UserController@setting_update');

	Route::get('/user/setting_confort', 'UserController@setting_confort');

	Route::get('/user/setting/mail', 'UserController@settingmail');
	Route::get('/user/setting/mail_update', 'UserController@settingmail_update');

	Route::get('/user/setting/mail_confort', 'UserController@settingmail_confort');

	Route::get('/user/setting/password', 'UserController@setting_password');
	Route::get('/user/setting/password_update', 'UserController@setting_password_update');
	Route::get('/user/setting/password_confort', 'UserController@setting_password_confort');

	Route::get('/user/setting/receive', 'UserController@settingreceive');
	Route::get('/user/setting/receive_confort', 'UserController@settingreceive_confort');

	Route::post('/user/setting/receive', 'UserController@settingreceive');
	Route::post('/user/setting/receive_confort', 'UserController@settingreceive_confort');
});