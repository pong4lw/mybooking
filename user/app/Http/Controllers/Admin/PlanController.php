<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

use App\Models\Services;
use App\Models\Service_descriptions;
use App\Models\Spaces;

use App\Models\Provieder_appoints;
use App\Models\Provieder_services;
use App\Models\Users;
use App\Models\Shops;
use App\Models\Tickets;
use App\Models\Admins;
use App\Models\Plans;
use App\Models\Shop_tickets;
use Carbon\Carbon;
class PlanController extends BaseController
{
	public function __construct()
	{
//		$this->middleware('auth');
	}

	public function index(){
		$shops = new Shops();
		$list['plan'] = Plans::all() ?? array();
		$list['services'] = Services::all();

		foreach($list['plan'] as $k => $plan) {
			$staff = Admins::where('id', '=', $plan['provider_id'])->first();
			$services = Services::where('id', '=', $plan['services_id'])->first();
			$list['plan'][$k]['services'] = $services->name ?? '';
			$list['plan'][$k]['provider'] = $staff->name ?? '';
			$list['plan'][$k]['client'] = Users::where('id', '=', $plan['client_id'])->first()->name ?? '';
			$list['plan'][$k]['services_time'] = $services->used_time ?? '';
			$list['plan'][$k]['ticket'] = $services->value ?? '';
			$time = new Carbon($plan->used_time);
			$list['plan'][$k]['end_time'] = $time->addSecond($services->used_time * 60);
		}

		$list['provider'] = Admins::all();
		foreach($list['provider'] as $k => $provider) {
			$list['provider'][$k]['plan_count'] = Plans::where('provider_id', '=', $provider['id'])->where('is_open','=','0')->where('is_delete','=','0')->where('shop_id', $shops->shopId)->count();
			$list['provider'][$k]['plan_encount'] = Plans::where('provider_id', '=', $provider['id'])->where('is_open','=','1')->where('is_delete','=','0')->where('shop_id', $shops->shopId)->count();
			$list['provider'][$k]['delete_count'] = Plans::where('provider_id', '=', $provider['id'])->where('is_delete','=','1')->where('shop_id', $shops->shopId)->count();
			$list['provider'][$k]['count'] = Plans::where('provider_id', '=', $provider['id'])->where('shop_id', $shops->shopId)->count();
		}
		return view('admin.index', $list);
	}

	public function create(){
		$shops = new Shops();

		$list['services'] = Services::where('shop_id', $shops->shopId)->get();
		$list['users'] = Users::where('shop_id', $shops->shopId)->get();
		$list['staffs'] = Admins::where('shop_id', $shops->shopId)->get();
		return view('admin.plancreate', $list);
	}

	public function update($id = null){
		$shops = new Shops();
		$list['plans'] = Plans::find($id);

		if($list['plans'] == null){
			$list['plans'] = new Plans();
		}
		$list['plans']->name = '';
		$list['plans']->space_id = '1';

		$list['plans']->client_id = $_REQUEST['user_id'];
		$list['plans']->services_id = $_REQUEST['services_id'];
		$list['plans']->provider_id = $_REQUEST['staffs_id'];
		$list['plans']->shop_id = $shops->shopId;
		$list['plans']->used_at = $_REQUEST['used_at'];
		$list['plans']->used_time = $_REQUEST['used_time'] ?? '10:00';
		$list['plans']->save();
		return redirect('admin/schedule');
//		return $this->index();
	}


	public function edit($id = null){
		$shops = new Shops();

		if(is_null($id)){
			return $this->create();
		}
		$list['services'] = Services::where('shop_id', $shops->shopId)->get();
		$list['users'] = Users::where('shop_id', $shops->shopId)->get();
		$list['staffs'] = Admins::where('shop_id', $shops->shopId)->get();
		$list['plan'] = Plans::find($id);

		return view('admin.planedit', $list);
	}

	public function schedule(){
		$plan = new Plans();
		$list['plan'] = $plan->find_all();
		return view('admin.plan', $list);
	}

	public function reservation(){
		$list['services'] = Services::type();
		$list['staffs'] = array('StaffA','StaffB','Admin');
		return view('admin.reservation',$list);
	}

	public function reservation_conform(){
		$clientId = '';
		$list['services'] = Services::type();
		$list['services'] = array($_REQUEST["services"] => $list['services'][$_REQUEST["services"]]);

		$list['staffs'] = Admins::where('shop_id', $shops->shopId)->get();
		$list['staffs'] = array($_REQUEST["staffs"] => $list['staffs'][$_REQUEST["staffs"]]);
		$list['re_date'] = $_REQUEST["re_date"];

		$list['tickets'] = Tickets::where('client_id', Auth::user()->id)->get();
		$list['tickets'] = $list['tickets'][0]->count;

		return view('user.reservation_conform', $list);
	}

	public function reservation_comp(){
		$shops = new Shops();

		$clientId = '';
		$list['services'] = Services::type();
		$list['services'] = array($_REQUEST["services"] => $list['services'][$_REQUEST["services"]]);
		$list['staffs'] = Admins::where('shop_id', $shops->shopId)->get();
		$list['staffs'] = array($_REQUEST["staffs"] => $list['staffs'][$_REQUEST["staffs"]]);
		$list['re_date'] = $_REQUEST["re_date"];

		$Tickets = Tickets::where('client_id', Auth::user()->id)->get();
		$Tickets = $Tickets[0];

		$count = $Tickets->count;

		$list['Tickets'] = $count;
		if($count == 0){
			return view('user.reservation_conform', $list);
		}

		$plans = new Plans();
		$plans->client_id = Auth::user()->id;
		$plans->space_id = 1;
		$plans->services_id = $_REQUEST['services'];
		$plans->provider_id = $_REQUEST['staffs'];
		$plans->used_at = $_REQUEST['re_date'];
		$plans->shop_id = $shops->shopId;
		$plans->save();

		$db = Tickets::where('client_id',Auth::user()->id)->update(['count' => $count-1]);

		$list['tickets'] = $count-1;

		return view('user.reservation_comp', $list);
	}


	public function ticketadd(){
		$shops = new Shops();
		$db = Tickets::where('client_id', Auth::user()->id)->update(['count' => 2]);

		if(!$db){
			$db = new Tickets();
			$db->client_id = Auth::user()->id;
			$db->count = 1;
			$db->shop_id = $shops->shopId;
			$db->save();
		}

	}

	public function ticketuse(){
		$shops = new Shops();

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

}
