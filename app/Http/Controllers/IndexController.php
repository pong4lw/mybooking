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

<<<<<<< HEAD
	public function index($shop_id){

=======
	public function index(){
>>>>>>> ca9fa7dc19c4d003e61539958651bd5338bf1723
	    return view('user.index',$list);
	}

	public function login(){
		$users = new \App\Models\Users();
		$list['users'] = $users->all();
	    return view('auth.login', $list);
	}
}
