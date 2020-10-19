<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
		use LogsActivity;
		
    public $timestamps = false;

    protected $table = 'settings';

    protected $primaryKey = 'id';

		protected $fillable = ['key', 'value'];
		
	public function getDescriptionForEvent($eventName)
	{
		return __CLASS__ . " model has been {$eventName}";
	}   		
}
