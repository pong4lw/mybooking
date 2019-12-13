<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClientController extends Controller
{
    public function __construct()
    {
   //     $this->middleware('auth');
    }

	public function index($shop_id){
	$list['prefix'] = Shopdsp::where('id',Auth::id())->first()->shop_url ?? '';		
	    return view('client.index',$list);
	}
}
