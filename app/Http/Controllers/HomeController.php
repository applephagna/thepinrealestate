<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Commune;
use App\Models\Category;
use App\Models\District;
use App\Models\Operator;
use App\Models\Property;
use App\Models\Province;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PropertyGallery;

class HomeController extends Controller
{
  protected $limit = 10;

	public function getDistrictSearch(Request $request)
  {
		$districts = District::whereHas("province",function($query) use ($request){
			$query->where('slug',$request->province_id);
		})
		->pluck("name_en","slug");
    return response()->json($districts);
  }

  public function getCommuneSearch(Request $request)
  {
    $communes = Commune::whereHas("district",function($query) use ($request){
			$query->where('slug',$request->district_id);
		})
		->pluck("name_en","slug");
    return response()->json($communes);
	}

	public function index(Request $request)
  {
    $data['protypes'] = PropertyType::with('cateSub')
                                	-> where('parent_id','>',0)
                                  ->orderBy('id')
                                  ->groupBy('name_en')
                                  ->get();
    $data['property_types'] = PropertyType::where('parent_id',0)->take(5)->get();
		// $data['categories'] = Category::where(['parent_id'=>0])->published()->get();
		if($request->location){
			$data['location'] = $request->location;
		} else {
			$data['location'] = '';
		}
		if($request->category){
			$data['s_category'] = $request->category;
		} else {
			$data['s_category'] = '';
		}
		$data['properties'] = Property::filterByRequest($request)->get();
    $data['provinces'] = Province::get();
		$data['category_by_properties'] = Category::where(['parent_id'=>5])->get();
		return view('front.property',$data);
  }

  public function property_by_province(Request $request,$slug)
  {
		$data['search_category']='house-and-land';
		$data['districts']=District::whereHas('province',function($query) use ($request){
			$query->where('slug','like','%'.$request->location.'%');
		})->pluck('name_en','slug');
		$data['province_id'] = $slug;
		if($request->input('district')){
			$data['district_id'] = $request->district;
		} else {
			$data['district_id'] = '';
		}
		if($request->input('commune')){
			$data['commune_id'] = $request->commune;
		} else {
			$data['commune_id'] = '';
		}
		$data['categories'] = Category::where(['parent_id'=>0])->published()->get();
		$data['pro_type'] = Category::where('slug',$data['search_category'])->first();
		$data['cat_type'] = Category::where('id',$data['pro_type']->parent_id)->first();
    $data['provinces'] = Province::pluck('name_en','slug');
		$data['property_by_province'] = Property::whereHas('province',function($query) use ($slug){
			$query->where('slug',$slug);
		})->paginate($this->limit);
    return view('front.property_by_province',$data);
  }

  public function listProperties()
  {
    $properties = Property::where('user_id',auth()->user()->id)
                           ->orderBy('created_at','desc')
                           ->get();
    return view('freeads.showAllProperties',compact('properties'));
  }

  public function allProperties(Request $request)
  {
		$data['search_category']='house-and-land';
    $data['protypes'] = PropertyType::where('parent_id','>',0)
                                  ->orderBy('id')
                                  ->groupBy('name_en')
                                  ->get();
		$data['category_by_properties'] = Category::where(['parent_id'=>5])
																							->Published()
																							->get();
		$data['categories'] = Category::where(['parent_id'=>0])->published()->get();
		$data['provinces'] = Province::pluck('name_en','slug');
		if($request->input('location')){
			$data['province_id'] = $request->input('location');
			$data['districts']=District::whereHas('province',function($query) use ($request){
				$query->where('slug','like','%'.$request->location.'%');
			})->pluck('name_en','slug');
		} else {
			$data['province_id'] = '';
		}
		if($request->input('district')){
			$data['district_id'] = $request->district;
			$data['communes']=Commune::whereHas('district',function($query) use ($request){
				$query->where('slug','like','%'.$request->district.'%');
			})->pluck('name_en','slug');
		} else {
			$data['district_id'] = '';
		}
		if($request->input('commune')){
			$data['commune_id'] = $request->commune;
		} else {
			$data['commune_id'] = '';
		}
		if($request->input('location') ||$request->input('district')||$request->input('commune') ){
			$data['allProperties'] = Property::FilterByCategories($request)->paginate($this->limit);
		} else {
      $data['allProperties'] = Property::orderBy('created_at','desc')
                                ->paginate($this->limit);
		}
    return view('front.all_properties',$data);
  }

  public function allPropertiesGrid(Request $request)
  {
		$data['search_category']='house-and-land';
    $data['protypes'] = PropertyType::where('parent_id','>',0)
                                  ->orderBy('id')
                                  ->groupBy('name_en')
                                  ->get();
		$data['category_by_properties'] = Category::where(['parent_id'=>5])
																							->Published()
																							->get();
		$data['categories'] = Category::where(['parent_id'=>0])->published()->get();
		$data['provinces'] = Province::pluck('name_en','slug');
		if($request->input('location')){
			$data['province_id'] = $request->input('location');
			$data['districts']=District::whereHas('province',function($query) use ($request){
				$query->where('slug','like','%'.$request->location.'%');
			})->pluck('name_en','slug');
		} else {
			$data['province_id'] = '';
		}
		if($request->input('district')){
			$data['district_id'] = $request->district;
			$data['communes']=Commune::whereHas('district',function($query) use ($request){
				$query->where('slug','like','%'.$request->district.'%');
			})->pluck('name_en','slug');
		} else {
			$data['district_id'] = '';
		}
		if($request->input('commune')){
			$data['commune_id'] = $request->commune;
		} else {
			$data['commune_id'] = '';
		}
		if($request->input('location') ||$request->input('district')||$request->input('commune') ){
			$data['allProperties'] = Property::FilterByCategories($request)->paginate($this->limit);
		} else {
      $data['allProperties'] = Property::orderBy('created_at','desc')
                                ->paginate($this->limit);
		}
    return view('front.all_properties-grid',$data);
  }

  public function property_by_type(Request $request, $type)
  {
		$data['search_category'] = $type;
		if($request->input('location')){
			$data['province_id'] = $request->location;
			$data['district_id']='';
			$data['districts']=District::whereHas('province',function($query) use ($request){
				$query->where('slug','like','%'.$request->location.'%');
			})->pluck('name_en','slug');
		} else {
			$data['province_id'] = '';
		}
		if($request->input('district')){
			$data['district_id'] = $request->district;
			$data['commune_id']='';
			$data['communes']=Commune::whereHas('district',function($query) use ($request){
				$query->where('slug','like','%'.$request->district.'%');
			})->pluck('name_en','slug');
		} else {
			$data['district_id'] = '';
		}
		if($request->input('commune')){
			$data['commune_id'] = $request->commune;
		} else {
			$data['commune_id'] = '';
		}
		if($request->input('ad_bedroom')){
			$data['bedroom'] = $request->ad_bedroom;
		} else {
			$data['bedroom'] = '';
		}
		if($request->input('ad_bathroom')){
			$data['bathroom'] = $request->ad_bathroom;
		} else {
			$data['bathroom'] = '';
		}
		if($request->input('ad_facing')){
			$data['face'] = $request->ad_facing;
		} else {
			$data['face'] = '';
		}
		if($request->from_ad_price){
			$data['from_ad_price']=$request->from_ad_price;
		} else {
			$data['from_ad_price']='';
		}
		if($request->to_ad_price){
			$data['to_ad_price']=$request->to_ad_price;
		} else {
			$data['to_ad_price']='';
		}
		if($request->from_ad_size){
			$data['from_ad_size']=$request->from_ad_size;
		} else {
			$data['from_ad_size']='';
		}
		if($request->to_ad_size){
			$data['to_ad_size']=$request->to_ad_size;
		} else {
			$data['to_ad_size']='';
		}
		$data['pro_type'] = Category::where('slug',$type)->first();
    $data['cat_type'] = Category::where('id',$data['pro_type']->parent_id)->first();
		$data['property_by_categories'] = Property::whereHas('parent',function($query) use ($type){
			$query->where('slug',$type);
		})->get();
    $data['categories'] = Category::where(['parent_id'=>0])->published()->get();
		$data['provinces'] = Province::pluck('name_en','slug');
		if($request->category){
			$data['property_by_categories'] = Property::filterByCategory($request)->get();
		}
    return view('front.properties_by_category',$data);
  }

  public function showProperties($slug)
  {
    $categories = Category::where(['parent_id'=>0])->published()->get();
    $property = Property::where('slug',$slug)->first();
    $view_name = $property->parent->form_name;
    $cellcards = Operator::pluck('cellcard')->toArray();
    $smarts = Operator::pluck('smart')->toArray();
    $metfones = Operator::pluck('metfone')->toArray();
    $qbs = Operator::pluck('qb')->toArray();
    $operator1 = substr($property->phone1, 0,3);
    $operator2 = substr($property->phone2, 0,3);
    $operator3 = substr($property->phone3, 0,3);
    $phone1 = $property->phone1;
    $phone2 = $property->phone2;
    $phone3 = $property->phone3;

    if ($property->phone1!='') {
      $operator1 = substr($property->phone1, 0,3);
    } else {
      $operator1='';
    }
    if ($property->phone2!='') {
      $operator2 = substr($property->phone2, 0,3);
    } else {
      $operator2='';
    }
    if ($property->phone3!='') {
      $operator3 = substr($property->phone3, 0,3);
    } else {
      $operator3='';
    }

    if($operator1){
      if(in_array($operator1,  $cellcards)){
        $operator_name1 = 'Cellcard';
      } else if(in_array($operator1,  $smarts)){
        $operator_name1 = 'Smart';
      } else if(in_array($operator1,  $metfones)){
        $operator_name1 = 'Metfone';
      } else if(in_array($operator1,  $qbs)){
        $operator_name1 = 'Qb';
      } else {
        $operator_name1 = 'Other';
      }
    } else {
      $operator_name1 = '';
    }

    if($operator2){
      if(in_array($operator2,  $cellcards)){
        $operator_name2 = 'Cellcard';
      } else if(in_array($operator2,  $smarts)){
        $operator_name2 = 'Smart';
      } else if(in_array($operator2,  $metfones)){
        $operator_name2 = 'Metfone';
      } else if(in_array($operator2,  $qbs)){
        $operator_name2 = 'Qb';
      } else {
        $operator_name2 = 'Other';
      }
    } else {
      $operator_name2 = '';
    }

    if($operator3){
      if(in_array($operator3,  $cellcards)){
        $operator_name3 = 'Cellcard';
      } else if(in_array($operator3,  $smarts)){
        $operator_name3 = 'Smart';
      } else if(in_array($operator3,  $metfones)){
        $operator_name3 = 'Metfone';
      } else if(in_array($operator3,  $qbs)){
        $operator_name3 = 'Qb';
      } else {
        $operator_name3 = 'Other';
      }
    } else {
      $operator_name3 = '';
    }
    $blogKey = 'blog_' .$property->id;
    if(!Session::has($blogKey)){
        $property->increment('view_count');
        Session::put($blogKey,1);
    }
    $random_properties = Property::inRandomOrder()->take(15)->get();
    // return $operator_name3;
    $images = PropertyGallery::where('property_id',$property->id)->get();
    return view($view_name.'.show',compact('property','images','categories','operator_name1','operator_name2','operator_name3','random_properties','phone1','phone2','phone3'));
  }

	public function mainSearch(Request $request)
	{
		if($request->location){
			$data['province_id']= $request->input('location');
		} else {
			$data['province_id']='';
		}
		if($request->district){
			$data['district_id']= $request->input('district');
		} else {
			$data['district_id']='';
		}
		if($request->commune){
			$data['commune_id']= $request->input('commune');
		} else {
			$data['commune_id']='';
		}
		$data['search_category'] = $request->category;
		$data['location'] = $request->location;
		$data['pro_type'] = Category::where('slug',$data['search_category'])->first();
		$data['cat_type'] = Category::where('id',$data['pro_type']->parent_id)->first();
		$data['provinces'] = Province::pluck('name_en','slug');
		$data['districts'] = District::whereHas("province",function($query) use ($request){
                                    $query->where('slug',$request->input('location'));
                                  })
                                  ->pluck("name_en","slug");
		$data['property_by_categories'] = Property::filterByRequest($request)->get();
		return view('front.search_form',$data);
	}

	public function searchByCategory(Request $request)
	{
		$data['search_category'] = $request->category;
		// if ($data['search_category']=='house-for-sale' || $data['search_category']=='house-for-rent'){
		if($request->input('ad_bedroom')){
			$data['bedroom'] = $request->ad_bedroom;
		} else {
			$data['bedroom'] = '';
		}
		if($request->input('ad_bathroom')){
			$data['bathroom'] = $request->ad_bathroom;
		} else {
			$data['bathroom'] = '';
		}
		if($request->input('ad_facing')){
			$data['face'] = $request->ad_facing;
		} else {
			$data['face'] = '';
		}
		// }
		if($request->input('location')){
			$data['province_id'] = $request->location;
			$data['districts']=District::whereHas('province',function($query) use ($request){
				$query->where('slug','like','%'.$request->location.'%');
			})->pluck('name_en','slug');
		} else {
			$data['province_id'] = '';
		}
		if($request->input('district')){
			$data['district_id'] = $request->district;
			// return $data['district_id'];
			$data['communes']=Commune::whereHas('district',function($query) use ($request){
				$query->where('slug','like','%'.$request->district.'%');
			})->pluck('name_en','slug');
		} else {
			$data['district_id'] = '';
		}
		if($request->input('commune')){
			$data['commune_id'] = $request->commune;
		} else {
			$data['commune_id'] = '';
        }
		if($request->from_ad_price){
			$data['from_ad_price']=$request->from_ad_price;
		} else {
			$data['from_ad_price']='';
		}
		if($request->to_ad_price){
			$data['to_ad_price']=$request->to_ad_price;
		} else {
			$data['to_ad_price']='';
		}
		if($request->from_ad_size){
			$data['from_ad_size']=$request->from_ad_size;
		} else {
			$data['from_ad_size']='';
		}
		if($request->to_ad_size){
			$data['to_ad_size']=$request->to_ad_size;
		} else {
			$data['to_ad_size']='';
		}
		$data['pro_type'] = Category::where('slug',$data['search_category'])->first();
		$data['cat_type'] = Category::where('id',$data['pro_type']->parent_id)->first();
		$data['provinces'] = Province::pluck('name_en','slug');
		$data['property_by_categories'] = Property::filterByCategory($request)->get();
		// return($data['property_by_categories']);
		return view('front.search_by_category',$data);
	}


}
