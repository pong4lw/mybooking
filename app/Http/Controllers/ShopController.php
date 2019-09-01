<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Shops;

class ShopController extends Controller
{
    public function index()
    {
    	$shops = new Shops();
    	echo "<pre>";
    	print_r($shops->shopIdArray);
    	echo "</pre>";

		exit;
//        return view('shop');
    }
}

