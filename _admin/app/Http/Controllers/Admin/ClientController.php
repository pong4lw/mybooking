<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminClientController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

	public function index(){
	    return view('client.index');
	}
}
