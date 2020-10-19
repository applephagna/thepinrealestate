<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
	public function district()
	{
		return $this->belongsTo(District::class,'district_id','id');
	}

	public function properties()
	{
		return $this->hasMany(Property::class,'id','commune_id');
	}
}
