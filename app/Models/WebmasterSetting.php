<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class WebmasterSetting extends Model
{
	use LogsActivity;

	protected $table = 'webmaster_settings';
	
	public function getDescriptionForEvent($eventName)
	{
		return __CLASS__ . " model has been {$eventName}";
	}
}
