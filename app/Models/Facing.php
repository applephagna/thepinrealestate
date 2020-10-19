<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facing extends Model
{
	public static function facings()
	{
		return static::pluck('facing', 'id');
	}
}
