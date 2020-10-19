<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Agent extends Model
{
	use Notifiable;
	use HasRoles;
	use LogsActivity;
	protected $fillable = [
    'user_id','referal_user_id',
    'referal_user_code','level',
    'ref_group','ref_level',
    'name_en','name_kh',
    'job_title','email',
    'phone','phone1','phone2',
    'facebook','twitter','pinterest','linkedin',
    'address','photo','description'
	];
	
	public function user(){
		return $this->belongsTo(User::class);
	}

}
