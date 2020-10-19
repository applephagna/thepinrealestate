<?php

namespace App\Models;

use App\Models\Upload as upload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends upload
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'categories';
	protected $primaryKey = 'id';
	protected $fillable = [
		'parent_id','type_id','sub_type_id',
		'category_name','category_name_kh',
		'description',
		'is_active',
		'slug','description',
		'form_name','form_header','form_footer',
		'icon','url',
	];

	public function childs()
	{
		return $this->hasMany(Category::class,'parent_id','id')->published();
	}

  public function scopePublished($query)
  {
    return $query->where('is_active',1);
  }

  public function type()
  {
  	return $this->belongsTo(PropertyType::class,'type_id','id');
  }

  public function categorytype()
  {
  	return $this->belongsTo(PropertyType::class,'type_id','id');
  }

  public function subtype()
  {
  	return $this->belongsTo(PropertyType::class,'sub_type_id','type_id');
  }

  public function categorysubtype()
  {
  	return $this->belongsTo(PropertyType::class,'sub_type_id','type_id');
  }

  public function properties()
  {
  	return $this->hasMany(Property::class,'parent_id','id');
  }

  public function subcate()
  {
    return $this->hasOne(Category::class,'id','parent_id')->published();
  }

  public static function categories()
  {
    return static::where(['parent_id'=>0])->published()->get();;
  }

  public static function parent()
  {
    return static::pluck('category_name', 'parent_id');
  }

}
