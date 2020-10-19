<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
  protected $table = 'property_type';

  public function childs()
  {
  	return $this->hasMany(PropertyType::class,'parent_id','id');
  }

  public function cateType()
  {
  	return $this->hasMany(Category::class,'type_id','parent_id');
  }

  public function categoryType()
  {
  	return $this->hasOne(Category::class,'type_id','parent_id');
  }

  public function cateSub()
  {
    return $this->hasMany(Category::class,'sub_type_id','type_id');
  }

  public function categorySub()
  {
    return $this->hasOne(Category::class,'sub_type_id','type_id');
  }

}
