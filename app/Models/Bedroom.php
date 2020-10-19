<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
	public static function bedrooms()
	{
		return static::pluck('slug', 'room');
	}
}
