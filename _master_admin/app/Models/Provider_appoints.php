<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Provider_appoints extends Eloquent
{
    use Notifiable;

    protected $table = 'provider_appoints';
    protected $primaryKey = 'id';


}
