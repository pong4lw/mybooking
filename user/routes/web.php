<?php

Route::get('/shop','ShopController@index');

/*
$prefix = 'aaa';

$shopdspList = \App\Models\Shopdsp::all();

var_dump($_SERVER['REQUEST_URI']);
//var_dump($shopdspList);
exit;
*/


//Route::group(['prefix' => $prefix,

Route::group([
	'middleware' => 'auth:web'],

 function(){
	Route::get('/', 'UserController@index');
	Route::get('/home', 'UserController@index');
	Route::get('/user', 'UserController@index');
	Route::get('/user/index', 'UserController@index');

	Route::get('/login', 'UserController@index');
	Route::post('/login', 'UserController@index');

	Route::get('/user/login', 'UserController@index')->name('login');
	Route::post('/user/login', 'UserController@index');

	Route::get('/user/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('/user/logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('/test', 'userController@test');


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

	Route::get('/user/schedule_delete/{id}', 'UserController@reservation');

	Route::get('/user/reservation_conform/{id}', 'UserController@reservation_conform');

	Route::get('/user/reservation_json', 'UserController@reservation_json');
	Route::post('/user/reservation_json', 'UserController@reservation_json');

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
	Route::get('/user/setting/password_update', 'UserController@setting_password');
	Route::get('/user/setting/password_update_confort', 'UserController@password_update_confort');

	Route::post('/user/setting/password_update', 'UserController@setting_password');
	Route::post('/user/setting/password_update_confort', 'UserController@password_update_confort');

	Route::get('/user/setting/password_confort', 'UserController@setting_password_confort');

	Route::get('/user/setting/receive', 'UserController@settingreceive');
	Route::get('/user/setting/receive_confort', 'UserController@settingreceive_confort');

	Route::post('/user/setting/receive', 'UserController@settingreceive');
	Route::post('/user/setting/receive_confort', 'UserController@settingreceive_confort');
});

Route::view('/', 'auth.login');

Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::group(['prefix' => 'user'], function(){
	Route::get('/login', 'Auth\LoginController@showLoginForm');
	Route::post('/login', 'Auth\LoginController@login')->name('login');
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('/logout', 'Auth\LoginController@logout');
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'Auth\RegisterController@register');
	Route::resetPassword();
	Route::emailVerification();
});

