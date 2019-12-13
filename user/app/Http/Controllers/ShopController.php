<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Shops;

class ShopController extends Controller
{
    public function index()
    {
    	var_dump($_REQUEST);
    	$shops = new Shops();
    	echo "<pre>";
    	print_r($shops->shopIdArray);
    	echo "</pre>";
	$list['prefix'] = Shopdsp::where('id',Auth::user()->shop_id)->first()->shop_url;
		exit;
//        return view('shop');
    }
}

