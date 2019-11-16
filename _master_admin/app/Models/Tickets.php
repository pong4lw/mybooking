<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Tickets extends Eloquent
{
    use Notifiable;

    protected $table = 'tickets';
    protected $primaryKey = 'id';

    public function counts($clientId = null){
    	if(is_null($clientId)){
    		return 0;
    	}
    	$res = \DB::table($this->table)->select('*')->where('client_id','=',$clientId)->get();
        if(!isset($res['count'])){
            return 0;
        }
        return $res['count'];
    }

      public function add($clientId = null){
        $db = $this->where('client_id',$clientId);
        var_dump($db);
//        $count = $db->count;

    }

}
