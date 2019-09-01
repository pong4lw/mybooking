<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Shops;

class Controller extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
	    return view('welcome');
	}
/*
	public function isShopId($shop_id){
		$shops = new Shops();
		foreach ($shops->shopIdArray as $k => $v) {
			if($v == $shop_id){
				return $shop_id;
			}
		}
		return false;
	}
*/
}
