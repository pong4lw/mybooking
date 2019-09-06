<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\Service;
use App\Models\Service_descriptions;
use App\Models\Spaces;

use App\Models\Provieder_appoints;
use App\Models\Provieder_services;
use App\Models\Users;
use App\Models\Tickets;

use App\Models\Plans;

class UserController extends BaseController
{
	public function __construct()
	{
	//		$this->middleware('auth');
	}

	public function index(){
		return view('admin.userlist');
	}

	public function reservation(){
		$shops = new Shops();
		$list['services'] = Service::type();
		$list['staffs'] = Staffs::where('shop_id', $shops->shopId)->get()->name;
		return view('admin.reservation',$list);
	}

	public function userlist(){
		$list['userList'] = Users::all();
		foreach($list['userList'] as $k =>$u){
			$list['userList'][$k]['ticket'] = Tickets::where('client_id', $u['id'])->get();
		}
		return view('admin.usersList', $list);
	}

	public function user($id){
		$users = new Users();
		$list['user'] = $users->where('id',$id)->first();

		return view('admin.user',$list);
	}
	
	public function userupdate($user_id = null){
		$users = new Users();		

		if($user_id == null){
			if($_REQUEST['name'] == ''){
				$list['user'] = $users;
				return view('admin.user',$list);
			}
			$list['user'] = $users;			
	            $list['user']['password'] = Hash::make("Test@1234");
		}else{
			$list['user'] = $users->where('id', $user_id)->first();
		}
		foreach ($_REQUEST as $k => $v) {
			$list['user'][$k] = $v;
		}
		$list['user']->save();
		return redirect('admin/user');
	}

	public function reservation_conform(){
		$clientId = '';
		$list['services'] = Service::type();


		$list['services'] = array($_GET["services"] => $list['services'][$_GET["services"]]);

		$list['staffs'] = Staffs::all()->name;
		$list['staffs'] = array($_GET["staffs"] => $list['staffs'][$_GET["staffs"]]);
		$list['re_date'] = $_GET["re_date"];

		$list['tickets'] = Tickets::where('client_id', Auth::user()->id)->get();
		$list['tickets'] = $list['tickets'][0]->count;

		return view('user.reservation_conform', $list);
	}

	public function reservation_comp(){
		$clientId = '';
		$list['services'] = Service::type();
		$list['services'] = array($_GET["services"] => $list['services'][$_GET["services"]]);
		$list['staffs'] = array('StaffA','StaffB','Admin');
		$list['staffs'] = array($_GET["staffs"] => $list['staffs'][$_GET["staffs"]]);

		$list['re_date'] = $_GET["re_date"];

		$Tickets = Tickets::where('client_id', Auth::user()->id)->get();
		$Tickets = $Tickets[0];

		$count = $Tickets->count;

		$list['tickets'] = $count;
		if($count == 0){
			return view('user.reservation_conform', $list);
		}

       	$plans = new Plans();
       	$plans->client_id = Auth::user()->id;
       	$plans->space_id = 1;

       	$plans->services_id = $_GET['services'];
       	$plans->provider_id = $_GET['staffs'];
       	$plans->used_at = $_GET['re_date'];

       	$plans->save();


       $db = Tickets::where('client_id',Auth::user()->id)->update(['count' => $count-1]);

		$list['tickets'] = $count-1;

		return view('user.reservation_comp', $list);
	}


	public function ticketadd(){
       $db = Tickets::where('client_id',Auth::user()->id)->update(['count' => 2]);
       if(!$db){
       	$db = new Tickets();
       	$db->client_id = Auth::user()->id;
       	$db->count = 1;
       	$db->save();
       }
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

	public function adminCreate(){
		return view('admin.create');
	}

	public function adminEdit(){
		return view('admin.edit');
	}

	public function adminDelete(){
		return view('admin.edit');
	}


	public function schedule(){
		return view('user.schedule');
	}

	public function product(){
		return view('user.product');
	}

	public function setting(){
		return view('user.setting');
	}

	public function settingmail(){
		return view('user.setting_mail');
	}
	public function settingreceive(){
		return view('user.setting_receive');
	}

}
