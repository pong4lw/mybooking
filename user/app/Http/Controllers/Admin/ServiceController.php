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

use App\Models\Staffs;
use App\Models\Shops;

use App\Models\Provieder_appoints;
use App\Models\Provieder_services;
use App\Models\Users;
use App\Models\Tickets;

use App\Models\Plans;

class ServiceController extends BaseController
{
	public function __construct()
	{

//		$this->middleware('auth');
	}

	public function index(){
		$shop = new Shops();
		$list['services'] = Services::where('shop_id',$shop->shopId)->get();
		return view('admin.serviceslist',$list);
	}

	public function service($id = null){
		$shop = new Shops();
		$list['service'] = Services::where('id', $id)->where('shop_id',$shop->shopId)->first();
		$list['staffs'] = Staffs::where('shop_id',$shop->shopId)->get();
		return view('admin.services',$list);
	}

	public function create($id = null){
		$shop = new Shops();
		$list['service'] = Services::where('id', $id)->first();
		$list['staffs'] = Staffs::where('shop_id',$shop->shopId)->get();
		return view('admin.services',$list);
	}

	public function update($id = null){
		if($id == '0'){
			$list['service'] = new Services();	
		}else{
			$list['service'] = Services::where('id', $id)->first();
		}
		$list['service']->name = $_REQUEST['name'];
		$list['service']->used_time = $_REQUEST['used_time'];
		$list['service']->value = $_REQUEST['tickets'];
		$list['service']->save();

		return redirect('admin/services');
	}

	public function reservation(){
		$list['services'] = Services::type();
		$list['staffs'] = Staffs::all();
		return view('user.reservation',$list);
	}

	public function reservation_conform(){
		$clientId = '';
		$list['services'] = Services::type();
		$list['services'] = array($_GET["services"] => $list['services'][$_GET["services"]]);

		$list['staffs'] = Staffs::where('shop_id',$shop->shopId)->get();
		$list['staffs'] = array($_GET["staffs"] => $list['staffs'][$_GET["staffs"]]);
		$list['re_date'] = $_GET["re_date"];

		$list['tickets'] = Tickets::where('client_id', Auth::user()->id)->where('shop_id',$shop->shopId)->get();
		$list['tickets'] = $list['tickets'][0]->count;

		return view('user.reservation_conform', $list);
	}

	public function reservation_comp(){
		$clientId = '';
		$list['services'] = Service::type();
		$list['services'] = array($_GET["services"] => $list['services'][$_GET["services"]]);
		$list['staffs'] = Staffs::all();
		$list['staffs'] = array($_GET["staffs"] => $list['staffs'][$_GET["staffs"]]);
		$list['re_date'] = $_GET["re_date"];

		$Tickets = Tickets::where('client_id', Auth::user()->id)->where('shop_id',$shop->shopId)->get();
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
    	$shop = new Shops();

       if(!$db){
       	$db = new Tickets();
       	$db->shop_id = $shop->shopId;
       	$db->client_id = Auth::user()->id;
       	$db->count = 1;
       	$db->save();
       }
	}

	public function ticketuse(){
		$Tickets = Tickets::where('client_id', Auth::user()->id)->where('shop_id', $shop->shopId)->get();
		$Tickets = $Tickets[0];

		$count = $Tickets->count;

		if($count == 0){
			return false;
		}
       $db = Tickets::where('client_id', Auth::user()->id)->where('shop_id', $shop->shopId)->update(['count' => $count-1]);
       if(!$db){
       	return false;
       }
	}

}
