<?php

namespace App\Http\Controllers\Agent;

use App\Models\Commune;
use App\Models\Category;
use App\Models\District;
use App\Models\Operator;
use App\Models\Property;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\PropertyGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ImageResize;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
  protected $operator_name1 = '';
  protected $operator_name2 = '';
  protected $operator_name3 = '';
  protected $operator1 = '';
  protected $operator2 = '';
  protected $operator3 = '';
  protected $tmp_path = 'ksupload-tmp';
  protected $upload_path = 'uploads';
  protected $resizes = [32, 48, 64, 72, 96, 128];
  protected $allow_size = (2048 * 1024);
  protected $allow_file = 'image/jpeg,.jpg,image/gif,.gif,image/png,.png,.jpeg';
  protected $limit   = 8;

  public function __construct()
  {
    @ini_set('upload_max_filesize', $this->allowsize);
  }

  public function getDistrictList(Request $request)
  {
    $districts = District::where("province_id",$request->province_id)
    ->pluck("name_en","id");
    return response()->json($districts);
  }

  public function getCommuneList(Request $request)
  {
    $communes = Commune::where("district_id",$request->district_id)
    ->pluck("name_en","id");
    return response()->json($communes);
  }

  public function index()
  {
  	$categories = Category::where(['parent_id'=>0])->published()->get();
  	return view('freeads.index',compact('categories'));
  }

  public function indexEdit($id)
  {
    $categories = Category::where(['parent_id'=>0])->published()->get();
    return view('freeads.index',compact('categories'));
  }

  public function store(Request $request)
  {
		$response = array();
		$files    = array();
		$errors   = array();
		$file_ini = array();

		if(Session::has($this->tmp_path)){
			//check max file upload
			if(count(Session::get($this->tmp_path)) > $this->limit){
				return $response =  response(
					array(
						'success' => false,
						'error'   => true,
						'message' => 'Limit :'.$this->limit
					),
					500
				);
			}
		}
		//check user upload file
		if($request->hasFile('files')){
			$files = $request->file('files');
			// check max filesize uploads
			foreach($files as $file){
				if($file->getSize() > $this->allow_size){
					$response = response(
						array(
							'success' => false,
							'error'   => true,
							'message' => 'File allow size  : '.$this->_human_filesize($this->allow_size)
							),
							500
					);
					$errors[] = array(
						'files' => array(
							'name' => $file->getClientOriginalName(),
							'type' => $file->getMimeType(),
							'size' => $this->_human_filesize($file->getSize()),
							'error' => 'File allow size  : '.$this->_human_filesize($this->allow_size)
						)
					);
					continue;
				} else {
					$fileExtension    = pathinfo(str_replace('/','.',$file->getMimeType()),PATHINFO_EXTENSION);
					if(preg_match("/{$fileExtension}/i", $this->allow_file)){
						$fileName  = $this->generate(8).'_'.$this->generate(15).'_'.$this->generate(19).'_n.'.$fileExtension;
						// if($file->move(public_path($this->tmp_path), $fileName)){
						if($file->move($this->tmp_path, $fileName)){
							$file_detail = array(
								'name' => $fileName,
								'path' => asset($this->tmp_path.'/'.$fileName),
								'type' => $fileExtension,
								// 'size' => File::size(public_path($this->tmp_path).'/'.$fileName)
								'size' => File::size($this->tmp_path.'/'.$fileName)
							);
							$file_ini[] = $file_detail;
							if(Session::has($this->tmp_path)){
								Session::push($this->tmp_path,$file_detail);
							}else{
								Session::put($this->tmp_path,$file_ini);
							}
						}
					}
				}
			}
			$response = array(
				'success' => true,
				'files'   => $file_ini,
				'errors'  => $errors,
				'count'   => count(session::get($this->tmp_path)),
      );
			if ($request->has('property_id')) {
				$response['count'] += PropertyGallery::where('property_id', $request->property_id)->count();
			}
		} else {
			$response = response(
				array(
					'success' => false,
					'error'   => true,
					'message' => 'File allow size  : '.$this->_human_filesize($this->allow_size)
				),
				500
			);
		}
		return $response;
  }

  public function rotate(Request $request, $id)
  {
    $response = array();
    if ($request->id) {
			// rotate image in tmp
			if (is_file(($this->tmp_path . '/' . $request->id))) {
				$img = ImageResize::make($this->tmp_path . '/' . $request->id);
				if ($img->rotate(-90)) {
					$img->save();
					$response = array(
						'success' => true,
						'message' => 'Rotate successfully.',
						'image'   => asset($this->tmp_path . '/' . $request->id).'?'.time()
					);
				}
			} else {
				// rotate image in table
        $imgTable = PropertyGallery::findOrFail($id);
				if (is_file(($this->upload_path . '/property/galleries/' . $imgTable->gallery_image))) {
					$img = ImageResize::make($this->upload_path . '/property/galleries/' . $imgTable->gallery_image);
					if ($img->rotate(-90)) {
						$img->save();
						$response = array(
							'success' => true,
							'message' => 'Rotate successfully.',
							'image'   => asset($this->upload_path . '/property/galleries/' . $imgTable->gallery_image).'?'.time()
						);
					}
				}
			}
    }
    return  $response;
  }

	public function delete(Request $request, $id)
	{
		$response = array();
		if ($request->id) {
			if (Session::has($this->tmp_path)) {
				$get_tmp = Session::get($this->tmp_path);
				foreach ($get_tmp as $key => $value) {
					if ($value['name'] === $request->id) {
						unset($get_tmp[$key]);
						// if (unlink(public_path($this->tmp_path . '/' . $request->id))) {
						if (unlink($this->tmp_path . '/' . $request->id)) {
							Session::put($this->tmp_path, $get_tmp);
							$response = array(
								'success' => true,
								'message' => 'Image Delete successfully.',
								'errors'  => Session::get($this->tmp_path),
								'count'   => count(Session::get($this->tmp_path)),
							);
						}
					}
				}
				if (!$response) {
					return $this->delect_gallery_image($id);
				}
			} else {
				return $this->delect_gallery_image($id);
			}
		}
		return $response;
	}

	public function delect_gallery_image($id)
	{
		$imgTable = PropertyGallery::findOrFail($id);
		if (is_file($this->upload_path . '/property/galleries/' . $imgTable->gallery_image)) {
			$delete = PropertyGallery::where('id', $id)->delete();
			if ($delete) {
				unlink($this->upload_path . '/property/galleries/' . $imgTable->gallery_image);
				return array(
					'success' => true,
					'message' => 'Image and Data Delete successfully.',
					'errors'  => null,
          'count'   => PropertyGallery::where('property_id', $imgTable->property_id)->count(),
				);
			}
		}
	}

	public function create($cate_id)
  {
    if(Session::has($this->tmp_path)){
			$get_tmp = Session::get($this->tmp_path);
			foreach ($get_tmp as $value) {
				@unlink(($this->tmp_path.'/'.$value['name']));
			}
			Session::forget($this->tmp_path);
		}
    $data['limit_field'] = $this->limit;
    $data['upload_url']  = \URL::to('/agent/post/image_upload_tmp');
    $data['save_url']    = \URL::to('/agent/post/store');
    $data['rotate_url']  = \URL::to('/agent/post/image/rotate').'/';
    $data['delete_url']  = \URL::to('/agent/post/image/delete').'/';
    $data['allow_size']  = $this->allow_size;
    $data['provinces'] = Province::pluck('name_en','id');
    $data['subcategory'] = Category::where(['id'=>$cate_id])->first();
    $data['view_name'] = $data['subcategory']->form_name;
    $data['category'] = Category::where('id',$data['subcategory']->parent_id)->first();
  	return view( $data['view_name'].'.create',$data);
	}

	public function saveProperties(Request $request)
  {
		if (Auth::check()){
			$property = new Property();
			$status = $request->is_active;
			$property->user_id = auth()->user()->id;
			$property->category_id = $request->category_id;
			$property->parent_id = $request->parent_id;
			$property->title = $request->title;
			$property->slug = $this->make_slug($request->title);
			$property->bedroom = ucwords($request->bedroom);
			$property->bathroom = ucwords($request->bathroom);
			$property->facing = $request->facing;
			$property->size = $request->size;
			$property->price = $request->price;
			$property->description = $request->description;
			$property->name = $request->name;
			$property->phone1 = $request->phone_1;
			$property->phone2 = $request->phone_2;
			$property->phone3 = $request->phone_3;
			$property->email = $request->email;
			$property->province_id = $request->province_id;
			$property->district_id = $request->district_id;
			$property->commune_id = $request->commune_id;
			$property->location = $request->location;
			$property->save_contact = $status;
			//upload image to property_galleries
			if($property->save()){
				$files = array();
				if (!is_dir($this->upload_path)) {
					mkdir(($this->upload_path),0777,true);
				}
				if (!is_dir($this->upload_path .'/property/galleries')) {
					mkdir($this->upload_path .'/property/galleries',0777,true);
				}
				if(Session::has($this->tmp_path)){
					$get_tmp = Session::get($this->tmp_path);
					$i = 0;
					foreach ($get_tmp as $imagefile) {
						$PropertyGallery = new PropertyGallery();
						$PropertyGallery->property_id = $property->id;
						$PropertyGallery->gallery_image = $imagefile['name'];
						$PropertyGallery->save();
						if(File::copy($this->tmp_path .'/' .$imagefile['name'], $this->upload_path .'/property/galleries/' .$imagefile['name']))
						{
							$file = array();
							$file['original'] = array(
									'name' => $imagefile['name'],
									'path' => asset($this->upload_path.'/property/galleries/' . $imagefile['name']),
									'size' => 'original',
								);
							$files[] = $file;
							unset($get_tmp[$i]);
							@unlink(($this->tmp_path.'/'.$imagefile['name']));
						}
						$i++;
					}
					$response = array(
						'success' => true,
						'title'	=> 'Save Successfully',
						'message' => 'Data and Image Save Successfully.',
						'files'   => $files,
						'count'   => count(Session::get($this->tmp_path)),
						'redirect' => \URL::to('/agent/manage_ads')
					);
				} else {
					$response = array(
						'success' => false,
						'error'   => true,
						'message' => 'No image.',
						'count'   => count(Session::get($this->tmp_path)),
					);
				}
				return $response;
			}
    } else {
      return redirect()->route('login');
    }
	}

	public function editProperties($property_id,$cat_id)
  {
    if(Session::has($this->tmp_path)){
			$get_tmp = Session::get($this->tmp_path);
			foreach ($get_tmp as $value) {
				@unlink(($this->tmp_path.'/'.$value['name']));
			}
			Session::forget($this->tmp_path);
    }
    $data['limit_field'] = $this->limit;
    $data['upload_url']  = \URL::to('/agent/post/image_upload_tmp');
    $data['save_url']    = \URL::to('/agent/post/store');
    $data['rotate_url']  = \URL::to('/agent/post/image/rotate').'/';
    $data['delete_url']  = \URL::to('/agent/post/image/delete').'/';
		$data['allow_size']  = $this->allow_size;
    $data['images'] = Property::gallery($property_id, asset($this->upload_path . '/property/galleries'));
		$data['count'] = PropertyGallery::where('property_id',$property_id)->count();
    $data['property'] =Property::findOrFail($property_id);
    $data['provinces'] =Province::pluck('name_en','id');
    $data['districts'] =District::where('province_id',$data['property']->province_id)->get();
    $data['communes'] =Commune::where('district_id',$data['property']->commune->district_id)->get();
    $data['subcategory'] =Category::where(['id'=>$cat_id])->first();
    $data['view_name'] = $data['subcategory']->form_name;
		$data['category'] =Category::where('id',$data['property']->category_id)->first();
    return view($data['view_name'].'.edit',$data);
	}

	public function updateProperties(Request $request, $property_id)
  {
		if (Auth::check()){
			$status = $request->is_active;
			$property = Property::findOrFail($property_id);
			$property->updated_by = auth()->user()->id;
			$property->category_id = $request->category_id;
			$property->parent_id = $request->parent_id;
			$property->title = $request->title;
			$property->slug = $this->make_slug($request->title);
			$property->size = $request->size;
			$property->price = $request->price;
			$property->description = $request->description;
			$property->name = $request->name;
			$property->phone1 = $request->phone_1;
			$property->phone2 = $request->phone_2;
			$property->phone3 = $request->phone_3;
			$property->email = $request->email;
			$property->province_id = $request->province_id;
			$property->district_id = $request->district_id;
			$property->commune_id = $request->commune_id;
			$property->location = $request->location;
			$property->bedroom = ucwords($request->bedroom);
			$property->bathroom = ucwords($request->bathroom);
			$property->facing = $request->facing;
			$property->save_contact = $status;
			if($property->save()){
				$files = array();
				if (Session::has($this->tmp_path)) {
					$get_tmp = Session::get($this->tmp_path);
					$i = 0;
					foreach ($get_tmp as $imagefile) {
						$PropertyGallery = new PropertyGallery();
						$PropertyGallery->property_id = $property->id;
						$PropertyGallery->gallery_image = $imagefile['name'];
						$PropertyGallery->save();
						if (File::copy($this->tmp_path . '/' . $imagefile['name'], $this->upload_path . '/property/galleries/' . $imagefile['name']))
						{
							$file = array();
							$file['original'] = array(
									'name' => $imagefile['name'],
									'path' => asset($this->upload_path . '/property/galleries/' . $imagefile['name']),
									'size' => 'original',
							);
							$files[] = $file;
							unset($get_tmp[$i]);
							@unlink($this->tmp_path . '/' . $imagefile['name']);
						}
						$i++;
					}
					$response = array(
						'success' => true,
						'title'	=> 'Update Successfully',
						'message' => 'Data and Image Updated Successfully.',
						'files'   => $files,
						'count'   => count(Session::get($this->tmp_path)),
						'redirect' => route('agent.dashboard')
					);
				} else {
					$response = array(
						'success' => false,
						'error'   => true,
						'title'	=> 'Update Successfully',
						'message' => 'Only Data has been update!',
						'count'   => '0',
						'redirect' => route('agent.dashboard')
					);
				}
				return $response;
			}
		} else{
			return redirect()->route('login');
		}
  }

  public function deleteProperties(Request $request)
  {
    if($request->ajax()){
      $property = Property::findOrFail($request->id);
      $imageGalleries = PropertyGallery::where('property_id',$property->id)->get();
      if($property->delete()){
        $dir = 'uploads/property/galleries/';
        foreach ($imageGalleries as $image) {
          $image->delete();
          File::delete($dir.$image->gallery_image);
        }
      }
      return response(['message'=>'Student Deleated Succeessfully']);
    }
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

  function make_slug($string) {
    return preg_replace('/\s+/u', '-', trim($string));
  }

  public static function generate($length = 8)
  {
		$chars = "0123456789011121314151617181920";
		$str = '';
		$size = strlen($chars);
		for ($i = 0; $i < $length; $i++) {
						$str .= $chars[rand(0, $size - 1)];
		}
		return $str;
  }

  public static function _human_filesize($bytes, $decimals = 2)
  {
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		$sz = (@$sz[$factor] == 'B') ? @$sz[$factor]: @$sz[$factor] .'B';
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .$sz  ;
  }

}
