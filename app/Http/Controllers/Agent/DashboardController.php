<?php

namespace App\Http\Controllers\Agent;

use App\Models\User;
use App\Models\Commune;
use App\Models\Category;
use App\Models\District;
use App\Models\Property;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
  public function index(Request $request)
  {
	  // $created_at = Property::findOrFail(2)->created_at;
    // $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', now());
    // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $created_at);
    // $diff_in_days = $to->diffInDays($from);
		// print_r($diff_in_days); // Output: 1
    if($request->location){
        $data['location'] = $request->location;
    } else {
        $data['location'] = '';
    }
    if($request->category){
        $data['category'] = $request->category;
    } else {
        $data['category'] = '';
    }
    if($request->sort){
        $data['sort'] = $request->sort;
    } else {
        $data['sort'] = '';
    }
    $data['categories'] = Category::where(['parent_id'=>0])->published()->get();
		$data['user'] = User::where('id',Auth::user()->id)->first();
		$data['provinces'] = Province::pluck('name_en','id');
		$data['properties'] = Property::FilterInProfile($request)->get();

    $data['count_properties'] = Property::where('user_id',$data['user']->id)
                                            ->expired()
                                            ->count();
    $data['premium'] = Property::where('user_id',$data['user']->id)
                                    ->expired()
                                    ->premium()
                                    ->get();
    $data['count_premium'] = Property::where('user_id',$data['user']->id)
                                        ->expired()
                                        ->premium()
                                        ->count();
    $data['expired_property'] = Property::where('user_id',$data['user']->id)
                                            ->countexpired()
                                            ->get();
    $data['count_expired_property'] = Property::where('user_id',$data['user']->id)
                                                ->countexpired()
                                                ->count();
    $data['category_by_user'] = Property::where('user_id',Auth::user()->id)
                                            ->groupBy('category_id')
                                            ->get();
    $data['subcategory_by_user']=Property::where('user_id',Auth::user()->id)
                                            ->groupBy('parent_id')
                                            ->get();
    // return $data['subcategory_by_user'];
		return view('agent.dashboard',$data);
  }

  public function profile(Request $request)
  {
    return view('agent.profile');
  }

  public function editProfile()
  {
    $data['user'] = User::findOrFail(auth()->id());
    $data['categories'] = Category::where(['parent_id'=>0])->published()->get();
    $data['provinces'] = Province::pluck('name_en','id');
    $data['districts'] =District::where('province_id',$data['user']->province_id)->get();
    $data['communes'] =Commune::where('district_id',$data['user']->district_id)->get();
    // $user = User::where('id',Auth::user()->id)->first();
    // return $user;
    return view('agent.edit_profile',$data);
  }

  public function updateProfile(Request $request,$id)
  {
    $this->validate($request, [
			'name_en' => 'required',
			'name_kh' => 'required',
			'phone' => 'required',
			'province_id' => 'required',
			'district_id' => 'required',
			'commune_id' => 'required',
		]);

		$user = User::findOrFail($id);
		$old_profile = $user->photo;
		$old_cover = $user->cover_photo;
    // check if profile photo is upload
		if($request->hasFile('profile_photo')){
			$image = $request->file('profile_photo');
			// $imageName = time().'.'.$request->image->extension();
			$profile_image_name = uniqid().'-'.time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = public_path('uploads/user/profile');
			if(!\file_exists($destinationPath)){
				mkdir($destinationPath, 0777, true);
			}
			$profile_path = public_path('uploads/user/profile/');
			if($old_profile && file_exists($profile_path.$old_profile)){
				unlink(	$profile_path . $old_profile);
			}
			// reisize image before upload
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(150, 150, function($constraint){
			$constraint->aspectRatio();
			})->save($destinationPath . '/' . $profile_image_name);
			// upload original image
			// $destinationPath = public_path('uploads/post');
			// $image->move($destinationPath, $profile_image_name);
		} else {
			if(is_null($old_profile)){
				$profile_image_name =  'user.png';
			} else {
				$profile_image_name =  $old_profile;
			}
    }
    // check if cover photo is upload
		if($request->hasFile('img_cover')){
    	$image = $request->file('img_cover');
			$cover_image_name = uniqid().'-'.time() . '.' . $image->getClientOriginalExtension();
			$destinationPath = public_path('uploads/user/cover');
			if(!\file_exists($destinationPath)){
				mkdir($destinationPath, 0777, true);
			}
			$cover_path = public_path('uploads/user/cover/');
			if($old_cover && file_exists($cover_path.$old_cover)){
				unlink(	$cover_path . $old_cover);
			}
			// reisize image before upload
			$resize_image = Image::make($image->getRealPath());
			$resize_image->resize(865, 325, function($constraint){
			$constraint->aspectRatio();
			})->save($destinationPath . '/' . $cover_image_name);
			// // upload original image
			// $destinationPath = public_path('uploads/post');
			// $image->move($destinationPath, $cover_image_name);
		} else {
			if(is_null($old_cover)){
				$cover_image_name =  'profile_cover.png';
			} else {
				$cover_image_name =  $old_cover;
			}
		}

		$data = array(
			'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'firstname_kh' => $request->firstname_kh,
			'lastname_kh' => $request->lastname_kh,
			'phone' => $request->phone,
			'phone1' => $request->phone1,
			'phone2' => $request->phone2,
			'province_id' => $request->province_id,
			'district_id' => $request->district_id,
			'commune_id' => $request->commune_id,
			'photo' => $profile_image_name,
			'cover_photo' => $cover_image_name,
    );
		$user->update($data);
		Toastr::success('Profile Successfully Updated!','Success');
		return redirect()->back();
	}

  public function changePassword()
  {
    $categories = Category::where(['parent_id'=>0])->published()->get();
    $user = User::where('id',Auth::user()->id)->first();
    return view('agent.change_password',compact('user','categories'));
  }

	public function updatePassword(Request $request)
	{
		$this->validate($request,[
			'old_password' => 'required',
			'password' => 'required|confirmed'
	 	]);
		$hashedPassword = Auth::user()->password;
		if(Hash::check($request->old_password,$hashedPassword)){
			if(!Hash::check($request->password,$hashedPassword)){
				$user = User::find(Auth::id());
				$user->password = Hash::make($request->password);
				$user->save();
				Toastr::success('Password Successfully Changed','Success');
				Auth::logout();
				return redirect()->route('login');
			} else {
				Toastr::error('New Password can not the same old password','Error');
				return redirect()->back();
			}
		} else {
			Toastr::error('Old Password does not much','Error');
			return redirect()->back();
		}
	}

	public function store()
  {
    $categories = Category::where(['parent_id'=>0])->published()->get();
    $user = User::where('id',Auth::user()->id)->first();
    return view('agent.store_information',compact('user','categories'));
  }

  public function storeBanner()
  {
    $categories = Category::where(['parent_id'=>0])->published()->get();
    $user = User::where('id',Auth::user()->id)->first();
    return view('agent.store_baner',compact('user','categories'));
  }

}
