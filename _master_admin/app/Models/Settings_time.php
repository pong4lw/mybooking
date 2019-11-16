<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Settings_time extends Eloquent
{
    use Notifiable;

    protected $table = 'settings_time';
    protected $primaryKey = 'id';

}
