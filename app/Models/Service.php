<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Service extends Eloquent
{
    use Notifiable;

    protected $table = 'services';
    protected $primaryKey = 'id';

    protected function type(){
    	$obj = \DB::table($this->table)->select('*')->get();
    	$result = array();
    	foreach ($obj as $key => $value) {
    		$result[$value->id] = $value->name;
    	}
    	return $result;
    }
}
