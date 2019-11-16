<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Shops extends Eloquent
{
    use Notifiable;

    protected $table = 'shops';
    protected $primaryKey = 'id';

    public $shopId = '0';
}
