<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * Created by SoulMaster
 * Created at 3/25/18
 * @package \App\Models
 **/

class Staffs extends Eloquent
{
    use Notifiable;

    protected $table = 'admins';
    protected $primaryKey = 'id';

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

    public function findStaffs() {
        Admins::where('user_type' ,'=', 'staff')->get();
        Timemanage::where('');
    }
}
