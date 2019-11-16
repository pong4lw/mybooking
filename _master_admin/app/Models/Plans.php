<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Plans extends Eloquent
{
    use Notifiable;

    protected $table = 'plans';
    protected $primaryKey = 'id';

    public function find_all(){
        $res = array();
    	foreach ($this->all() as $k => $v){
    		$res[$k] = $v;
			$res[$k]['space'] = $v['space_id'];
			$res[$k]['services'] = Services::find($v->services_id);
			$res[$k]['client'] = Users::where('id', $v->client_id)->get();
			$res[$k]['provider'] = Admins::where('id',$v->provider_id)->get();
    	}
    	return $res;
    }


}
