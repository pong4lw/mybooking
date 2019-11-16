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
//        $this->middleware('auth');
    }

	public function index(){
	    return view('user.index');
	}

	public function login(){
		$users = new \App\Models\Users();
		$users = $users->where('shop_id', $shops->shopId)->get();
	    return view('auth.login', $users);
	}
}
