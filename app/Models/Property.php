<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Models\Upload as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Property extends Eloquent
{
	protected $primaryKey = 'id';
	protected $table = 'properties';
	protected $fillable = [
		'user_id',
		'category_id',
		'parent_id',
		'title',
		'slug',
		'bedroom',
		'bathroom',
		'facing',
		'size',
		'price',
		'description',
		'name',
		'phone1',
		'phone2',
		'phone3',
		'email',
		'province_id',
		'district_id',
		'commune_id',
		'location',
		'save_contact',
		'updated_by',
		'expired_day',
		'is_expired',
		'is_premium',
		'renew_date'
	];

	public function user()
	{
		return $this->belongsTo(User::class,'user_id','id');
	}

	public function province()
	{
		return $this->belongsTo(Province::class,'province_id','id');
	}

	public function district()
	{
		return $this->belongsTo(District::class,'district_id','id');
	}

	public function commune()
	{
		return $this->belongsTo(Commune::class,'commune_id','id');
	}

	public function category()
	{
		return $this->belongsTo(Category::class,'category_id','id');
	}

	public function parent()
	{
		return $this->belongsTo(Category::class,'parent_id','id');
	}

    public function galleries()
    {
	    return $this->hasMany(PropertyGallery::class,'property_id','id');
    }

	public function scopeExpired($query)
    {
        return $query->where('is_expired',0);
	}

	public function scopeCountExpired($query)
    {
        return $query->where('is_expired',1);
	}

	public function scopePremium($query)
    {
        return $query->where('is_premium',1);
	}

	public static function gallery($property_id, $image_path)
	{
		$get = PropertyGallery::where('property_id', $property_id)->orderBy('created_at', 'ASC')->get()->toArray();
		if ($get) {
			$data = [];
			foreach ($get as $row) {
				$data[] = [
					'id'    => $row['id'],
					'image' => $image_path . '/' . $row['gallery_image'],
				];
			}
			return $data;
		}
	}

	public function scopeFilterByRequest($query, Request $request)
	{
		if ($request->input('location')) {
			// $query->where('province_id', '=', $request->input('location'));
			$query->whereHas('province', function ($query) use ($request) {
				$query->where('slug', $request->input('location'));
			});
		}
		if ($request->input('category')) {
			// $query->where('parent_id', $request->input('category'));
			$query->whereHas('parent', function ($query) use ($request) {
				$query->where('slug', $request->input('category'));
			});
		}
		if ($request->input('q')) {
			$query->where('title', 'LIKE', '%'.$request->input('q').'%');
		}
		return $query;
	}

	public function scopeFilterByCategories($query, Request $request)
	{
		if ($request->input('location')) {
			// $query->where('province_id', '=', $request->input('location'));
			$query->whereHas('province', function ($query) use ($request) {
				$query->where('slug', $request->input('location'));
			});
		}
		if ($request->input('district')) {
			$query->whereHas('district', function ($query) use ($request) {
				$query->where('slug', $request->input('district'));
			});
		}
		if ($request->input('commune')) {
			$query->whereHas('commune', function ($query) use ($request) {
				$query->where('slug', $request->input('commune'));
			});
		}
		if ($request->input('category')) {
			// $query->where('parent_id', $request->input('category'));
			$query->whereHas('category', function ($query) use ($request) {
				$query->where('slug', $request->input('category'));
			});
		}
		return $query;
	}

	public function scopeFilterInProfile($query, Request $request)
	{
		if(auth()->user()->role_id==1 || auth()->user()->role_id==2){
			$query = Property::expired();
		} else {
			$query = Property::where('user_id',auth()->user()->id)
			->expired();
		}
		if ($request->input('category')) {
			$query->where('parent_id', $request->input('category'));
		}
		if ($request->input('location')) {
			$query->where('province_id', '=', $request->input('location'));
		}
		if ($request->input('search')) {
			$query->where('title', 'LIKE', '%'.$request->input('search').'%');
		}
		if ($request->input('from_price') && $request->input('to_price')) {
			$query->whereBetween('price', [$request->input('from_price'),$request->input('to_price')]);
		}
		if ($request->input('sort')) {
			switch ($request->input('sort')){
				case 'posted_date_desc':
					$query->orderBy('created_at', 'DESC');
						break;
				case 'posted_date_asc':
					$query->orderBy('created_at', 'ASC');
						break;
				case 'renew_date_desc':
					$query->orderBy('renew_date', 'DESC');
						break;
				case 'renew_date_asc':
					$query->orderBy('renew_date', 'ASC');
						break;
				case 'price_desc':
						$query->orderBy('price', 'DESC');
						break;
				case 'price_asc':
					$query->orderBy('price', 'ASC');
						break;
				default:
					$query->orderBy('created_at', 'DESC');
			}
		}
		return $query;
	}

	public function scopeFilterByCategory($query, Request $request)
	{
		if ($request->input('ad_bedroom')) {
			$query->where('bedroom', 'like', '%'.$request->input('ad_bedroom').'%');
		}
		if ($request->input('ad_bathroom')) {
			$query->where('bathroom', 'like', '%'.$request->input('ad_bathroom').'%');
		}
		if ($request->input('ad_facing')) {
			$query->where('facing', 'like', '%'.$request->input('ad_facing').'%');
		}
		if ($request->input('from_ad_price')) {
			$query->where('price', '>=', $request->input('from_ad_price'));
		}
		if ($request->input('to_ad_price')) {
			$query->where('price', '<=', $request->input('to_ad_price'));
		}
		if ($request->input('from_ad_size')) {
			$query->where('size', '>=', $request->input('from_ad_size'));
		}
		if ($request->input('to_ad_size')) {
			$query->where('size', '<=', $request->input('to_ad_size'));
		}
		if ($request->input('location')) {
			$query->whereHas('province', function ($query) use ($request) {
				$query->where('slug', $request->input('location'));
			});
		}
		if ($request->input('district')) {
			$query->whereHas('district', function ($query) use ($request) {
				$query->where('slug', $request->input('district'));
			});
		}
		if ($request->input('commune')) {
			$query->whereHas('commune', function ($query) use ($request) {
				$query->where('slug', $request->input('commune'));
			});
		}
		if ($request->input('category')) {
			$query->whereHas('parent', function ($query) use ($request) {
				$query->where('slug', $request->input('category'));
			});
		}
		// if ($request->input('sortby')) {
		// 	switch ($request->input('sortby')){
		// 		case 'latestads':
		// 			$query->orderBy('latestads', 'ASC');
		// 				break;
		// 		case 'newads':
		// 			$query->orderBy('newads', 'DESC');
		// 				break;
		// 		case 'mosthitads':
		// 			$query->orderBy('mosthitads', 'DESC');
		// 				break;
		// 		case 'priceasc':
		// 			$query->orderBy('renew_date', 'ASC');
		// 				break;
		// 		case 'pricedesc':
		// 				$query->orderBy('price', 'DESC');
		// 				break;
		// 		default:
		// 			$query->orderBy('latestads', 'ASC');
		// 	}
		// }
		return $query;
	}

    public function scopeFilterByType($query, Request $request)
	{
		if ($request->input('from_ad_price')) {
			$query->where('price', '>=', $request->input('from_ad_price'));
		}
		if ($request->input('to_ad_price')) {
			$query->where('price', '<=', $request->input('to_ad_price'));
		}
		if ($request->input('from_ad_size')) {
			$query->where('size', '>=', $request->input('from_ad_size'));
		}
		if ($request->input('to_ad_size')) {
			$query->where('size', '<=', $request->input('to_ad_size'));
		}
		if ($request->input('location')) {
			$query->whereHas('province', function ($query) use ($request) {
				$query->where('slug', $request->input('location'));
			});
		}
		if ($request->input('district')) {
			$query->whereHas('district', function ($query) use ($request) {
				$query->where('slug', $request->input('district'));
			});
		}
		if ($request->input('commune')) {
			$query->whereHas('commune', function ($query) use ($request) {
				$query->where('slug', $request->input('commune'));
			});
		}
		if ($request->input('category')) {
			$query->whereHas('parent', function ($query) use ($request) {
				$query->where('slug', $request->input('category'));
			});
		}
		// if ($request->input('sortby')) {
		// 	switch ($request->input('sortby')){
		// 		case 'latestads':
		// 			$query->orderBy('latestads', 'ASC');
		// 				break;
		// 		case 'newads':
		// 			$query->orderBy('newads', 'DESC');
		// 				break;
		// 		case 'mosthitads':
		// 			$query->orderBy('mosthitads', 'DESC');
		// 				break;
		// 		case 'priceasc':
		// 			$query->orderBy('renew_date', 'ASC');
		// 				break;
		// 		case 'pricedesc':
		// 				$query->orderBy('price', 'DESC');
		// 				break;
		// 		default:
		// 			$query->orderBy('latestads', 'ASC');
		// 	}
		// }
		return $query;
	}

	public function scopePropertyReport($query, Request $request)
	{
		$query = Property::with(['category','parent','province','district','commune'])
					->where('category_id',5);
		if($request->input('sortby')!=''){
			switch ($request->input('sortby')){
				case 'posted_date_desc':
					$query->orderBy('created_at', 'DESC');
				break;
				case 'posted_date_asc':
					$query->orderBy('created_at', 'ASC');
				break;
				case 'renew_date_desc':
					$query->orderBy('renew_date', 'DESC');
				break;
				case 'renew_date_asc':
					$query->orderBy('renew_date', 'ASC');
				break;
				case 'price_desc':
					$query->orderBy('price', 'DESC');
				break;
				case 'price_asc':
					$query->orderBy('price', 'ASC');
                break;
				case 'view_desc':
					$query->orderBy('view_count', 'DESC');
				break;
				case 'view_asc':
					$query->orderBy('view_count', 'ASC');
				break;                
				default:
					$query->orderBy('created_at', 'DESC');
			}
		}
		if($request->input('from_date')!=''){
			$query->whereBetween('created_at',array($request->input('from_date'),$request->input('to_date')));
		}
		if($request->input('location')<>0){
			$query->where('province_id',$request->input('location'));
		}
		if($request->input('type')<>0){
			$query->where('parent_id',$request->input('type'));
		}
		if($request->input('purpose')<>0){
			$query->whereHas('parent',function($query) use  ($request){
				$query->where('sub_type_id',$request->input('purpose'));
			});
		}
		return $query;
	}

}
