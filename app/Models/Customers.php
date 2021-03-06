<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\User as Eloquent;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Class User
 * Created by SoulMaster
 * Created at 3/25/18
 * @package \App\Models
 **/

class Customers extends Eloquent
{
    use Notifiable;

    protected $table = 'customers';
    protected $primaryKey = 'user_id';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
