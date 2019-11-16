<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
	$list['prefix'] = Shopdsp::where('id',Auth::id())->first()->shop_url;    	
        return view('user.index',$list);
    }
}

