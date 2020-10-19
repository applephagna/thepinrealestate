<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	public function districts()
	{
		return $this->hasMany(District::class,'province_id','id');
	}

	public function properties()
	{
		return $this->hasMany(Property::class,'id','province_id');
	}
}
