<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

use App\Models\Users;
class Shops extends Eloquent
{   
    use Notifiable;

    protected $table = 'shops';
    protected $primaryKey = 'id';

	static $shopId;

    static $shopArray = array(
        '0' => 'デモ店舗',
        '1' => "学大",
        '2' => "烏丸",
        '3' => "豊中"
    );

    var $shopIdArray = array(
    	'1' => "gakudai",
    	'3' => "toyonaka"
    );

    public function __construct()
    {
        $this->shopId = Users::where('id',\Auth::id())->first()->shop_id;
    }

    static public function bussinesstimeArray($re_date =''){

        $settingsTime = \DB::table('settings_time')->select('*')->where('shop_id','=',Shops::$shopId)->first()->value ?? 0;
        $result = array(
            'settingsTime' => $settingsTime
        );

        $settingsBussinessTime = \DB::table('settings_bussiness_time')->select('*')->where('shop_id','=',Shops::$shopId)->where('used_at','=',$re_date)->get();

        if($settingsBussinessTime->count() > 0){
            $result['bussinessTime'] = $settingsBussinessTime;
          return $result;
        }

        $w = date('w',strtotime($re_date));
        if($w == 0){
            $w = 7;
        }
        $weekBussinessTime = \DB::table('shops')->select('*')->where('shop_id','=',Shops::$shopId)->where('week',$w)->get();

        if($weekBussinessTime->count() > 0){
            $result['bussinessTime'] = $weekBussinessTime;
          return $result;
        }

        $result['bussinessTime'] = array();
        return $result;
    }


   static public function shiftTimeArray($re_date ='', $providerId = 1){
        $settingsTime = \DB::table('settings_time')->select('*')->where('shop_id','=',Shops::$shopId)->first()->value ?? 0;

        $result = array(
            'settingsTime' => $settingsTime
        );

        $shift_day = \DB::table('shift_day')->select('*')->where('shop_id','=',Shops::$shopId)->where('used_at','=',$re_date)->where('provider_id',$providerId)->get();

        if($shift_day->count() > 0){
            $result['bt'] = $shift_day;
          return $result;
        }

        $w = date('w',strtotime($re_date));
        if($w == 0){
            $w = 7;
        }
        $weekBussinessTime = \DB::table('shift_week')->select('*')->where('shop_id','=',Shops::$shopId)->where('provider_id',$providerId)->where('week',$w)->get();

        if($weekBussinessTime->count() > 0){
            $result['bt'] = $weekBussinessTime;
          return $result;
        }

        $result['bt'] = array(0=>array('open'=>'','close'=>''));
        return $result;
    }


    static function searchShift($providerId = null){
        if(is_null($providerId)){
            return false;
        }

        $shift_week = Shift_week::where('provider_id', '=', $providerId)->get();

        $shift_day = Shift_day::where('provider_id', '=', $providerId)->get();

        $week = Shift_week::weekArray('shop_id', Shops::$shopId);

        for($d = 1; $d <= date('t'); $d++){ 
            $d = str_pad($d, 2, 0, STR_PAD_LEFT);
            $timestamp = strtotime(date('Y').'-'.date('m').'-'.$d );
            $w = date('w',$timestamp);
            if($w == 0){ $w =7;}

            $week[$w]['used_at'] = date('Y').'-'.date('m').'-'.$d;
            $result[date('Y').'-'.date('m').'-'.$d] = $week[$w];
        }

        foreach($shift_day as $shift){
            if(!empty($shift->used_at)){
                $day = explode('-', $shift->used_at);

                $result[$day[0].'-'.str_pad($day[1],2,0,STR_PAD_LEFT).'-'.str_pad($day[2],2,0,STR_PAD_LEFT)] = $shift;
            }
        }
        return $result;
    }


}
