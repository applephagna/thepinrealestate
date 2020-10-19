<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bathroom extends Model
{
	public static function bathrooms()
	{
		return static::pluck('slug', 'room');
	}
}
