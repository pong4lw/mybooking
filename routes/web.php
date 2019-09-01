<?php

/*
Route::get('/admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin', 'Admin\Auth\LoginController@showLoginForm')->name('
	admin.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){	

	Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/', 'Admin\Auth\LoginController@showLoginForm')->name('
		admin.login');

	Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'Auth\RegisterController@register');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){	
	Route::get('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
	Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
	Route::resetPassword();
	Route::emailVerification();

//ダッシュボード
	Route::get('index', 'AdminController@index');
	Route::post('sindex', 'AdminController@index');

//カレンダー
	Route::get('/schedule', 'AdminController@schedule');
	Route::post('/schedule', 'AdminController@schedule');

//ユーザー
	Route::get('/user', 'AdminController@user');
	Route::post('/user', 'AdminController@user');

//スタッフ
	Route::get('/staff', 'AdminController@staff');
	Route::post('/staff', 'AdminController@staff');

//メニュー
	Route::get('/', 'AdminController@index');
	Route::post('/', 'AdminController@index');
});
*/

//Route::Auth();
/*
Route::group(['prefix' => 'user'], function(){	
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');

	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
	Route::resetPassword();
	Route::emailVerification();
});
*/
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
//	Route::get('/user', 'UserController@index');

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