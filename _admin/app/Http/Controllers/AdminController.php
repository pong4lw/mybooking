<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

use App\Models\Customers;
use App\Models\Users;
use App\Models\Admins;
use App\Models\Tickets;
use App\Models\Plans;
use App\Models\Services;
use App\Models\Shops;

class AdminController extends Controller
{
	public function __construct()
	{
//		 $this->middleware('auth:admin');
	}

	public function index(){

		$shops = new Shops();
		$list['adminuser'] = Admins::find(Auth::id());

		$list['plan'] = Plans::where('shop_id', $list['adminuser']['shop_id'])->get() ;

		$list['services'] = Services::all();

		foreach($list['plan'] as $k => $plan) {
			$staff = Admins::where('id',  $plan['provider_id'])->first();
			$services = Services::where('id',  $plan['services_id'])->first();
			$list['plan'][$k]['services'] = $services->name ?? '';
			$list['plan'][$k]['provider'] = $staff->name ?? '';
			$list['plan'][$k]['client'] = Users::where('id',  $plan['client_id'])->first()->name ?? '';
			$list['plan'][$k]['services_time'] = $services->used_time ?? '';
			$list['plan'][$k]['ticket'] = $services->value ?? '';
		}

		$list['count_all'] = Plans::where('is_delete','0')->where('used_at','<=',date('Y-m-31'))->where('used_at','>=',date('Y-m-01'))->where('shop_id', $list['adminuser']['shop_id'])->count();
		$list['count_plan'] = Plans::where('used_at','>=',date('Y-m-d'))->where('shop_id', $list['adminuser']['shop_id'])->count();
		$list['count_users'] = Users::where('is_delete','0')->where('shop_id', $list['adminuser']['shop_id'])->count();
		$list['provider'] = Admins::where('shop_id', $list['adminuser']['shop_id'])->get();
		foreach($list['provider'] as $k => $provider) {
			$list['provider'][$k]['plan_count'] = Plans::where('provider_id',  $provider['id'])->where('is_open','0')->where('is_delete','0')->where('shop_id', $list['adminuser']['shop_id'])->count();
			$list['provider'][$k]['plan_encount'] = Plans::where('provider_id',  $provider['id'])->where('is_open','1')->where('is_delete','0')->where('shop_id', $list['adminuser']['shop_id'])->count();
			$list['provider'][$k]['delete_count'] = Plans::where('provider_id',  $provider['id'])->where('is_delete','1')->where('shop_id', $list['adminuser']['shop_id'])->count();
			$list['provider'][$k]['count'] = Plans::where('provider_id',  $provider['id'])->where('shop_id', $list['adminuser']['shop_id'])->count();
		}
		return view('admin.index', $list);
	}

	public function userlist(){
		$list['userList'] = Users::all();
		$list['adminuser'] = Admins::find(Auth::id());

		foreach($list['userList'] as $k => $u){
			$list['userList'][$k]['ticket'] = Tickets::where('client_id',  $u['id'])->where('shop_id', $list['adminuser']['shop_id'])->get();
		}
		return view('admin.usersList', $list);
	}

	public function user($id){
		$users = new Users(); 
		$list['adminuser'] = Admins::find(Auth::id());
		$list['user'] = $users->find($id);
		return view('admin.user', $list);
	}
	
	public function userupdate($id){
		$users = new Users();
		$list['user'] = $users->find($id);
		$list['adminuser'] = Admins::find(Auth::id());

		return view('admin.user',$list);
	}

	public function login(){
		return view('admin.auth.login');
	}

	public function schedule(){
		//	$customer = new Customers();
		//	$customer = $customer->where('shop_id', $list['adminuser']['shop_id'])->get();

		$plan = new Plans();
		$list['adminuser'] = Admins::find(Auth::id());

		$list['plan'] = $plan->where('shop_id', $list['adminuser']['shop_id'])->get();
		return view('admin.schedule', $list);

	}

	public function plan(){
		$plan = new Plans();
		$shops = new Shops();
		$list['plan'] = $plan->where('shop_id', $list['adminuser']['shop_id'])->get();
		$list['adminuser'] = Admins::find(Auth::id());

		return view('admin.plan', $list);
	}

	public function reservation(){
		$shops = new Shops();
		$list['services'] = Services::type();
		$list['staffs'] =  Admins::where('shop_id', $list['adminuser']['shop_id'])->get();
		$list['adminuser'] = Admins::find(Auth::id());

		return view('admin.reservation',$list);
	}

	public function notification(){
		$shops = new Shops();

		$list['adminuser'] = Admins::find(Auth::id());	
		$list['notification'] = Services::type();
		$list['staffs'] = Admins::where('shop_id', $list['adminuser']['shop_id'])->get();

		$list['plans'] = Plans::where('shop_id', $list['adminuser']['shop_id'])->get()->sortBy('used_at');
		$list['week'] = array('0'=>'日','1'=>'月','2'=>'火','3'=>'水','4'=>'木','5'=>'金','6'=>'土',);

		foreach($list['plans'] as $k => $plan){	
			$list['plans'][$k]['space'] = $plan['space_id'];
			$list['plans'][$k]['services'] = Services::find($plan['services_id']);
			$list['plans'][$k]['client'] = Users::where('id', $plan['client_id'])->first();
			$list['plans'][$k]['provider'] = Admins::where('id',$plan['provider_id'])->first();
		}
		return view('admin.notification',$list);
	}

	public function usercreate(){
		$customer = new users();
    	$shops = new Shops();
	
       	$plans->client_id = Auth::id();

		$customer = $customer->where('shop_id', $list['adminuser']['shop_id'])->get();
		return view('admin.user',$customer);
	}

	public function postusercreate(){
		$_GET;
		$customer = new users();
		$list['adminuser'] = Admins::find(Auth::id());

		return view('admin.user',$customer);
	}

	public function useredit(){
		$customer = new Users();
		$shops = new Shops();
		$list['adminuser'] = Admins::find(Auth::id());
	
		$customer = $customer->where('shop_id', $list['adminuser']['shop_id'])->get();
		return view('admin.user',$customer);
	}

	public function staff(){
		$customer = new Customers();
		$shops = new Shops();
		$list['adminuser'] = Admins::find(Auth::id());
		$customer = $customer->where('shop_id', $list['adminuser']['shop_id'])->get();
		return view('admin.staff',$customer);
	}

}

