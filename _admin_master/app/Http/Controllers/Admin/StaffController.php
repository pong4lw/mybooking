<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

use App\Models\Services;
use App\Models\Service_descriptions;
use App\Models\Spaces;

use App\Models\Provieder_appoints;
use App\Models\Provieder_services;
use App\Models\Users;
use App\Models\Tickets;
use App\Models\Admins;
use App\Models\Plans;
use App\Mail\ContactMail;
use App\Models\Shops;


class StaffController extends Controller
{
	public function __construct()
	{
		//	$this->middleware('auth');
	}

	public function index(){
		return view('admin.userlist');
	}

	public function stafflist(){
		$shops = new Shops();
		$list['adminuser'] = Admins::find(Auth::id());

		$list['staffs'] = Admins::where('id','!=','0')->get();
		foreach($list['staffs'] as $k =>$u){
			$list['staffs'][$k]['ticket'] = Tickets::where('client_id', $u['admin_id'])->where('shop_id', $shops->shopId)->get();
		}
		return view('admin.staffsList', $list);
	}

	public function staff($id){
		$shops = new Shops();
		$staffs = new Admins();
		$list['staffs'] = $staffs->find($id);
		$list['adminuser'] = Admins::find(Auth::id());
		$list['skill'] = Services::where('id','!=','0')->get();

		return view('admin.staffs', $list);
	}
	
	public function staffadd(){
		$staffs = new Admins();
		$list['adminuser'] = Admins::find(Auth::id());
		$list['Admins'] = $staffs->find(Auth::id());
		return view('admin.staffaddcomp');
	}
	
	public function staffaddsave(){
		$staffs = new Admins();
		$list['staffs'] = $staffs->find($id);
		$list['adminuser'] = Admins::find(Auth::id());

		return view('admin.staffs',$list);
	}

	public function staffaddmail(){
		$email = $_REQUEST['email'];
		$list['adminuser'] = Admins::find(Auth::id());

		if($_REQUEST['user_type'] == "staff"){

		}

		if($_REQUEST['user_type'] == "staff2"){

		}
	}

  public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                'required',
                'file',
                'image',
                'mimes:jpeg,png',
                'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/staff');

            $user = Admins::find($id);
            $user->avatar_filename = basename($filename);
            $user->save();

            return redirect('admin/staff')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }

	public function staffupdate($staffs_id = null){
		$staffs = new Admins();
		$shops = new Shops();

		$list['staffs'] = $staffs->find($staffs_id);
		$list['adminuser'] = Admins::find(Auth::id());

		if($staffs_id == null){
			if($_REQUEST['name'] == ''){
				$list['staffs'] = $staffs;
				return view('admin.user',$list);
			}
			$list['staffs'] = $staffs;			
	            $list['staffs']['password'] = Hash::make("Test@1234");
		}else{
			$list['staffs'] = $staffs->where('id',$staffs_id)->where('shop_id', $shops->shopId)->first();
		}
		$shop_id = $shops->shopId;

		$list['staffs']['name'] = $_REQUEST['name'];
		$list['staffs']['email'] = $_REQUEST['email'];
		$list['staffs']['tel'] = $_REQUEST['tel'];
		$list['staffs']['address'] = $_REQUEST['address'];
		$list['staffs']['user_type'] = $_REQUEST['user_type'];
		$list['staffs']['shop_id'] = $shop_id;

		$list['staffs']->save();
	
			return redirect('admin/staff');
	}
}
