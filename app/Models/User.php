<?php

namespace App\Models;

// use App\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;
  use HasRoles;
  use LogsActivity;

	protected $guard_name ='web';

	protected $fillable = [
		'name_en','name_kh',
		'referal_code','ref_group','ref_level',
		'username','phone',
		'phone1','phone2',
		'email', 'password',
		'address','location',
		'province_id','district_id','commune_id',
		'photo','cover_photo'
	];

	protected $hidden = [
		'password', 'remember_token',
	];


	public function agent(){
		return $this->hasOne(Agent::class);
	}

	public function proerties()
	{
		return $this->hasMany(Property::class,'id','user_id');
	}

	public function getDescriptionForEvent($eventName)
	{
			return __CLASS__ . " model has been {$eventName}";
	}
}
