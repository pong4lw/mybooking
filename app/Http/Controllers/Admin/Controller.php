<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function isAdmin($id = null) {
 		if(Auth::admin()->user_type == 'admin'){return true;}
		return false;
    }

    public function isStaff($id = null) {
 		if(Auth::admin()->user_type == 'staff'){return true;}
 		if(Auth::admin()->user_type == 'staff2'){return true;}
		return false;
    }

}

