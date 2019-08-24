<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Service;
use App\Models\Service_descriptions;
use App\Models\Spaces;

use App\Models\Provieder_appoints;
use App\Models\Provieder_services;
use App\Models\Users;
use App\Models\Tickets;
use App\Models\Admin;

use App\Models\Plans;

class UserController extends BaseController
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		return view('user.index');
	}

	public function reservation(){
		$list['services'] = Service::type();
		$staffs = Admin::where('user_type' ,'=', 'staff')->get();

		if(!count($staffs)){
			$list['staffs'] = array();
		}
		foreach ($staffs as $v) {
			$list['staffs'][$v['id']] = $v;
		}
		return view('user.reservation',$list);
	}

	public function reservation_update($id = null){
		if(isset($_GET['id'])){$id = $_GET['id'];}
		$list['services'] = Service::type();
		$staffs = Admin::where('user_type' ,'=', 'staff')->get();
		if(is_null($id)){
			return $this->reservation();
		}
		$list['plans'] = Plans::where('id', '=', $id)->first();
		if(!count($staffs)){
			$list['staffs'] = array();
		}
		foreach ($staffs as $v) {
			$list['staffs'][$v['id']] = $v;
		}

		return view('user.reservation_update', $list);
	}

	public function reservation_update_conform($id = null){
		if(isset($_GET['id'])){$id = $_GET['id'];}
		$list['services'] = Service::type();
		$staffs = Admin::where('user_type' ,'=', 'staff')->get();
		if(is_null($id)){
			return $this->reservation();
		}
		$plans = Plans::where('id', '=', $id)->first();
		if(!count($staffs)){
			$list['staffs'] = array();
		}
		foreach ($staffs as $v) {
			$list['staffs'][$v['id']] = $v;
		}

		$plans->client_id = Auth::user()->id;
		$plans->space_id = 1;
		$plans->services_id = $_GET['services'];
		$plans->provider_id = $_GET['staffs'];
		$plans->used_at = $_GET['re_date'];
		$plans->used_time = $_GET['re_time'];
		$plans->save();
		$list['plans'] = $plans;

		return view('user.reservation_update_conform', $list);
	}

	public function reservation_cancel($id = null){
		if(isset($_GET['id'])){$id = $_GET['id'];}
		$list['services'] = Service::type();
		$staffs = Admin::where('user_type' ,'=', 'staff')->get();
		if(is_null($id)){
			return $this->reservation();
		}
		$list['plans'] = Plans::where('id', '=', $id)->first();
		if(!count($staffs)){
			$list['staffs'] = array();
		}
		foreach ($staffs as $v) {
			$list['staffs'][$v['id']] = $v;
		}

		return view('user.reservation_cancel', $list);
	}

	public function reservation_cancel_conform($id = null){
		if(isset($_GET['id'])){$id = $_GET['id'];}
		$list['services'] = Service::type();
		$staffs = Admin::where('user_type' ,'=', 'staff')->get();
		if(is_null($id)){
			return $this->reservation();
		}
		$plans = Plans::where('id', '=', $id)->first();
		if(!count($staffs)){
			$list['staffs'] = array();
		}
		foreach ($staffs as $v) {
			$list['staffs'][$v['id']] = $v;
		}

		$plans->client_id = Auth::user()->id;
		$plans->is_delete = 1;
		$plans->save();
		$list['plans'] = $plans;

		return view('user.reservation_cancel_conform', $list);
	}

	public function reservation_change($id = null){
		if(isset($_GET['id'])){$id = $_GET['id'];}
		$list['services'] = Service::type();
		$staffs = Admin::where('user_type' ,'=', 'staff')->get();
		if(is_null($id)){
			return $this->reservation();
		}
		$list['plans'] = Plans::where('id', '=', $id)->first();
		if(!count($staffs)){
			$list['staffs'] = array();
		}
		foreach ($staffs as $v) {
			$list['staffs'][$v['id']] = $v;
		}

		return view('user.reservation_change', $list);
	}

	public function reservation_conform($id = null){
		$clientId = '';
		$list['services'] = Service::type();
		$list['services'] = array($_GET["services"] => $list['services'][$_GET["services"]]);

		$staffs = Admin::where('user_type' ,'=', 'staff')->get();
		foreach ($staffs as $v) {
			$list['staffs'][$v['id']] = $v;
		}

		$list['staffs'] = array($_GET["staffs"] => $list['staffs'][$_GET["staffs"]]);
		$list['re_date'] = $_GET["re_date"];
		$list['re_time'] = $_GET["re_time"];
		$list['tickets'] = Tickets::where('client_id', '=', Auth::user()->id)->first() ?? '0';
		return view('user.reservation_conform', $list);
	}

	public function reservation_comp($id = null){
		$clientId = '';
		$list['services'] = Service::type();
		$list['services'] = array($_GET["services"] => $list['services'][$_GET["services"]]);

		$list['staffs'] = array($_GET["staffs"] => Admin::find($_GET["staffs"]));
		$list['re_date'] = $_GET["re_date"];
		$list['re_time'] = $_GET["re_time"];

		$Tickets = Tickets::where('client_id', '=',Auth::user()->id)->first() ?? '0';

		$count = $Tickets->count ?? 0;

		$list['tickets'] = $count;
	/*
		if($count == 0){
			return view('user.reservation_conform', $list);
		}
	*/
		$plans = new Plans();
		$plans->name = '1'.$_GET['services'].$_GET['staffs'].$_GET['re_date'];

		$plans->client_id = Auth::user()->id;
		$plans->space_id = 1;
		$plans->services_id = $_GET['services'];
		$plans->provider_id = $_GET['staffs'];
		$plans->used_at = $_GET['re_date'];
		$plans->used_time = $_GET['re_time'];
		$plans->save();

		$db = Tickets::where('client_id',Auth::user()->id)->update(['count' => $count-1]);

//ticket デモ版用　カウントしない
		$list['tickets'] = $count;
//		$list['tickets'] = $count-1;
		return view('user.reservation_comp', $list);
	}

	public function ticketadd(){
		$db = Tickets::where('client_id', '=', Auth::user()->id)->first();
		if(!$db){
			$db = new Tickets();
			$db->client_id = Auth::user()->id;
			$db->count = 1;
		}else{
			$db->count = $db->count+1;

		}
		return $db->save();
	}

	public function ticketuse(){
		$Tickets = Tickets::where('client_id', Auth::user()->id)->get();
		$Tickets = $Tickets[0];
		$count = $Tickets->count;
		if($count == 0){
			return false;
		}

		$db = Tickets::where('client_id',Auth::user()->id)->update(['count' => $count-1]);

		if(!$db){
			return false;
		}
	}

	public function schedule(){
		$list['plan'] = Plans::where('client_id', Auth::user()->id)->orderBy('used_at')->get();
		$list['week'] = array('日','月','火','水','木','金','土');
		foreach ($list['plan'] as $k => $v) {
			$m = Service::where('id', '=' , $v->services_id)->first()->used_time;

			if(!empty($v->used_at)){
				$time1 = $v->used_at.' '.$v->used_time;
				$tmp = strtotime('+'.$m.' minute' , strtotime($time1));

				$list['plan'][$k]['endtime'] = date('H:i',$tmp);
			}
		}
		return view('user.schedule', $list);
	}

	public function product(){
		return view('user.product');
	}

	public function setting(){
		$get = $_GET;
		$list['user'] = Users::find(Auth::user()->id);
		return view('user.setting', $list);
	}

	public function setting_update(){
		$get = $_GET;
		$list['user'] = Users::find(Auth::user()->id);
		return view('user.setting_update', $list);
	}

	public function setting_confort(){
		$get = $_GET;
		$user = Users::find(Auth::user()->id);

		$list['user'] = $user;
		if(!isset($get['name'])){
			return view('user.setting_update', $list);
		}

		$user['name'] = $get['name'];
		$user['tel'] = $get['tel'];
		$user['address'] = $get['address'];
		$user['tel2'] = $get['tel2'];
		$user->save();
		return view('user.setting', $list);
	}

	public function settingmail(){
		$user = Users::find(Auth::user()->id);
		$list['user'] = $user;
		$list['user'] = $user;

		return view('user.setting_mail', $list);
	}

	public function settingmail_update(){
		$user = Users::find(Auth::user()->id);
		$list['user'] = $user;
		$list['user'] = $user;

		return view('user.setting_mail_update', $list);
	}

	public function settingmail_confort(){
		$get = $_GET;
		$user = Users::find(Auth::user()->id);

		$list['user'] = $user;
		if(!isset($get['email_send'])){
			return view('user.setting_mail', $list);
		}

		$user['email'] = $get['email_send'];
//		$user['password'] = Hash::make($get['password']);
		$user->save();
		return view('user.setting_mail', $list);
	}

	public function setting_password(){
		$get = $_GET;
		$user = Users::find(Auth::user()->id);

		$list['user'] = $user;
		if(!isset($get['email_send'])){
			return view('user.setting_mail', $list);
		}

		$user['email'] = $get['email_send'];
		$user['password'] = Hash::make($get['password']);
		return view('user.setting_mail', $list);
	}

	public function setting_password_update(){
		$get = $_GET;
		$user = Users::find(Auth::user()->id);

		$list['user'] = $user;
		if(!isset($get['password'])){
			return view('user.setting_mail', $list);
		}

//		$user['email'] = $get['email_send'];
		$user['password'] = Hash::make($get['password']);
		$user->save();
		return view('user.setting_mail', $list);
	}

	public function setting_password_confort(){
		$get = $_GET;
		$user = Users::find(Auth::user()->id);

		$list['user'] = $user;
		if(!isset($get['password'])){
			return view('user.setting_mail', $list);
		}

//		$user['email'] = $get['email_send'];
		$user['password'] = Hash::make($get['password']);
		$user->save();
		return view('user.setting_mail', $list);
	}

	public function settingreceive(){
		$user = Users::find(Auth::user()->id);
		$list['user'] = $user;
		return view('user.setting_receive', $list);
	}

	public function settingreceive_confort(){
		$get = $_GET;
		$user = Users::find(Auth::user()->id);		
		
		$list['user'] = $user;
		if(!isset($get['name'])){
			return view('user.setting_receive_confort', $list);
		}

		$user['is_receive'] = $get['receive'];
		$user->save();
		return view('user.setting_receive_confort', $list);
	}
}