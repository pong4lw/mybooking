<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Customers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
	    return view('admin.index');
	}

	public function login(){
	    return view('admin.auth.login');
	}

	public function schedule(){
		$customer = new Customers();
		$customer = $customer->all();
	    return view('admin.schedule',$customer);
	}

	public function user(){
		$customer = new Customers();
		$customer = $customer->all();
	    return view('admin.user',$customer);
	}

	public function staff(){
		$customer = new Customers();
		$customer = $customer->all();
	    return view('admin.staff',$customer);
	}

}

