<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyGallery extends Model
{
	protected $table = 'property_galleries';
	protected $fillable = [
		'property_id',
		'gallery_image'
	];

  public function gallery()
  {
  	return $this->belongsTo(Property::class,'property_id','id');
  }
}
