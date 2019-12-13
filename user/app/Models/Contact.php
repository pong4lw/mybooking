<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model{
	private $table = 'contact';
	protected static $_table_name = 'contact';
	protected static $_primary_key = 'id';
	
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    
	public function init()
	{		
		parent::init();
	}
}
