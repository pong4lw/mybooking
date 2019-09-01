<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Shops extends Eloquent
{
	
    use Notifiable;

    protected $table = 'shops';
    protected $primaryKey = 'id';


    var $shopIdArray = array(
    	'1' => "gakudai",
    	'2' => "karasuma",
    	'3' => "toyonaka"
    );
}
