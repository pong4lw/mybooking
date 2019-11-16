<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Service_descriotions extends Eloquent
{
    use Notifiable;

    protected $table = 'Services_descriotions';
    protected $primaryKey = 'id';


}
