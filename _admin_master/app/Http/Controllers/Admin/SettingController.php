<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
use App\Models\Shops;
use App\Models\Shop_tickets;


class SettingController extends Controller
{
	public function __construct()
	{
	//		$this->middleware('auth');
	}

	public function index(){
		$shops = new Shops();
		$list['week'] = array();
		for( $w = 1; $w <= 7 ; $w++ ){
			$shops = Shops::where('week', '=', $w)->where('shop_id', $shops->shopId)->first();
			if(is_null($shops)){
				$shops = new Shops();
			}
			$list['week'][$w]['start'] = $shops->open ?? "";
			$list['week'][$w]['end'] = $shops->close ?? "";
		}

		return view('admin.setting',$list);
	}

	public function ticket(){
		$shops = new Shops();
		$list['tickets'] = Shop_Tickets::where('shop_id', $shops->shopId)->get();
		return view('admin.setting_ticket',$list);
	}

	public function ticket_update(){
		$shops = new Shops();
		$list['tickets'] = Shop_Tickets::where('shop_id', $shops->shopId)->get();
		foreach ($_GET['sales'] as $k => $v) {
			$array[$k]['sales'] = (int)$v ?? 0;
		}
		foreach ($_GET['unit_price'] as $k => $v) {
			$array[$k]['unit_price'] = (int)$v ?? 0;
		}
		foreach ($_GET['tax_rate'] as $k => $v) {
			$array[$k]['tax_rate'] = (int)$v ?? 0;
		}
		foreach ($array as $k => $v) {
			$Shop_Tickets = Shop_Tickets::find($k);
			if(is_null($Shop_Tickets)){
				$Shop_Tickets = new Shop_Tickets();
			}
			$price = $v['sales'] * $v['unit_price'] + $v['sales'] * $v['unit_price'] * $v['tax_rate']/100 ;
			$Shop_Tickets->sales = $v['sales'] ?? 0;
			$Shop_Tickets->unit_price = $v['unit_price'] ?? 0;
			$Shop_Tickets->tax_rate = $v['tax_rate'] ?? 0;
			$Shop_Tickets->price = (int)$price;

			$Shop_Tickets->save();
		}
		return redirect('admin/setting_ticket');
	}

	public function ticket_delete(){
		$shops = new Shops();
		$Shop_Tickets = Shop_Tickets::where('shop_id', $shops->shopId)->where('id', $_GET['id'])->get();
		if(!is_null($Shop_Tickets)){$Shop_Tickets->delete();}
		return $this->ticket();
	}

	public function update(){
		$shops = new Shops();

		for( $w = 1; $w <= 7 ; $w++ ){
			$array[$w]['start'] = $_GET["w".$w."_1"] ?? "10:00";
			$array[$w]['end'] = $_GET["w".$w."_2"] ?? "22:00";

			$shops = Shops::where('week', '=', $w)->where('shop_id', $shops->shopId)->first();
			if(is_null($shops)){
				$shops = new Shops();
			}
			$shops->open = $array[$w]['start'] ;
			$shops->close = $array[$w]['end'] ;
			$shops->week = $w ;

			$shops->save();
		}

		return $this->index();
	}


}
