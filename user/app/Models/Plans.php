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


}
