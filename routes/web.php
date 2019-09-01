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
	Route::get('{shop_id}/user', 'AdminController@user');
	Route::post('{shop_id}/user', 'AdminController@user');

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

Route::view('login', 'login');

Route::group(['prefix' => 'gakudai/user'], function(){
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
	Route::resetPassword();
	Route::emailVerification();
});

Route::group(['prefix' => 'toyonaka/user'], function(){	
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');
	Route::resetPassword();
	Route::emailVerification();
});

Route::group(['prefix' => 'karasuma/user'], function(){	
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	
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
	Route::get('{shop_id}/user', 'UserController@index');

//ダッシュボード
	Route::get('{shop_id}/user/index', 'UserController@index');

//新規予約	
	Route::get('{shop_id}/user/reservation', 'UserController@reservation');
	Route::get('{shop_id}/user/reservation_conform', 'UserController@reservation_conform');
	Route::get('{shop_id}/user/reservation_comp', 'UserController@reservation_comp');

	Route::post('{shop_id}/user/reservation', 'UserController@reservation');
	Route::post('{shop_id}/user/reservation_conform', 'UserController@reservation_conform');

	Route::get('{shop_id}/user/ticketadd', 'UserController@ticketadd');
	Route::post('{shop_id}/user/ticketadd', 'UserController@ticketadd');

	Route::get('{shop_id}/user/ticketuse', 'UserController@ticketuse');
	Route::post('{shop_id}/user/ticketuse', 'UserController@ticketuse');

//予定確認
	Route::get('{shop_id}/user/schedule', 'UserController@schedule');
	Route::get('{shop_id}/user/schedule_update', 'UserController@reservation_update');
	Route::get('{shop_id}/user/schedule_change', 'UserController@reservation_change');

	Route::get('{shop_id}/user/schedule_update_conform', 'UserController@reservation_update_conform');

	Route::get('{shop_id}/user/schedule_cancel', 'UserController@reservation_cancel');
	Route::get('{shop_id}/user/schedule_cancel_conform', 'UserController@reservation_cancel_conform');

	Route::get('{shop_id}/user/schedule_delete/{$id}', 'UserController@reservation');

	Route::get('{shop_id}/user/reservation_conform/{$id}', 'UserController@reservation_conform');

//チケット
	Route::get('{shop_id}/user/product', 'UserController@product');

//設定
	Route::get('{shop_id}/user/setting', 'UserController@setting');
	Route::get('{shop_id}/user/setting_update', 'UserController@setting_update');

	Route::get('{shop_id}/user/setting_confort', 'UserController@setting_confort');

	Route::get('{shop_id}/user/setting/mail', 'UserController@settingmail');
	Route::get('{shop_id}/user/setting/mail_update', 'UserController@settingmail_update');

	Route::get('{shop_id}/user/setting/mail_confort', 'UserController@settingmail_confort');

	Route::get('{shop_id}/user/setting/password', 'UserController@setting_password');
	Route::get('{shop_id}/user/setting/password_update', 'UserController@setting_password_update');
	Route::get('{shop_id}/user/setting/password_confort', 'UserController@setting_password_confort');

	Route::get('{shop_id}/user/setting/receive', 'UserController@settingreceive');
	Route::get('{shop_id}/user/setting/receive_confort', 'UserController@settingreceive_confort');

	Route::post('{shop_id}/user/setting/receive', 'UserController@settingreceive');
	Route::post('{shop_id}/user/setting/receive_confort', 'UserController@settingreceive_confort');
});