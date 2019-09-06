<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Users;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index($shop_id){

	    return view('user.index',$list);
	}

	public function login($shop_id){
		$list['shopId'] = $this->isShopId($shop_id);
		if(!$list['shopId']){
			return redirect('login');
		}		

		$users = new \App\Models\Users();
		$list['users'] = $users->all();
	    return view('auth.login', $list);
	}
}
