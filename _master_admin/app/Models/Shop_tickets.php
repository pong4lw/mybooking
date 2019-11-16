<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Shop_tickets extends Eloquent
{
    use Notifiable;

    protected $table = 'shop_tickets';
    protected $primaryKey = 'id';


}
