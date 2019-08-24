<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;

class StaffController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		$this->middleware('auth');
	}

	//  スタッフ登録
	public function signup(){

	}

	//  スタッフマイページ 
	public function mypage(){
      	$user = new User();

		return view('staff.index',compact('user'));
	}

    //　各契約する書面
	public function agrement(){

	}

    //　スキルチェック
	public function skillcheck(){

	}

	//  スタッフ予定　確定分
	public function schedule(){

	}

	//  スタッフ予定の予約
	public function scheduleadd(){

	}
	//  スタッフ予定の更新
	public function scheduleupdate(){

	}
	//  お気に入りの仕事情報検索
	public function marksearch(){

	}
	//  リクエストがかかっているお仕事
	public function request(){

	}
	//  仕事上の注意点・要望等・持ち物確認
	public function comment(){

	}
	//  出発連絡
	public function open(){

	}
	//  完了連絡
	public function close(){

	}

}