<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

	public function index(){
	    return view('admin.index');
	}

	public function login(){
		$customer = new Customers();
		$customer = $customer->all();
	    return view('admin.auth.login',$customer);
	}
	 public function isAdmin($id = null) {
        $id = ($id) ? $id : $this->id;
        return $id == config('admin_id');
    }
}
