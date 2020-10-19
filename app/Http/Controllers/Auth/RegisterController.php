<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use App\Models\Agent;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
  use RegistersUsers;

  public function __construct()
  {
    $this->middleware('guest');
  }

  public function showRegistrationForm()
  {
    $categories = Category::where(['parent_id'=>0])->get();
    return view('auth.register',compact('categories'));
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name_en' => 'required|string|max:255',
      'name_kh' => 'required|string|max:255',
      'username' => 'required|string|max:255',
      'referal_code' => 'required|max:15',
      'referal_user_id' => 'required|max:15',
      'referal_user_code' => 'required|max:15',
      'phone' => 'required|string|max:255|unique:users,phone',
      'email' => 'required|string|email|max:255|unique:users,email',
      'password' => 'required|string|min:6|confirmed',
    ]);
  }

  protected function create(array $data)
  {
    $referal_code = $data['referal_code'];
    $ref_group = User::where('referal_code',$referal_code)->first();
    $ref_user_count = Agent::where('referal_user_code',$referal_code)->count();
    if($ref_group->ref_group=='OWNER'){
      $ref_group_level = 'G1';
    } elseif($ref_group->ref_group=='G1'){
      $ref_group_level = 'G2';
    } elseif($ref_group->ref_group=='G2'){
      $ref_group_level = 'G3';
    } elseif($ref_group->ref_group=='G3'){
      $ref_group_level = 'G4';
    } elseif($ref_group->ref_group=='G4'){
      $ref_group_level = 'G5';
    }
    $ref_level = $ref_group_level.'-'.'00'.($ref_user_count+1);
    $user = User::create([
      'name_en' => $data['name_en'],
      'name_kh' => $data['name_kh'],
      'username' => $data['username'],
      'phone' => $data['phone'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'referal_code' => mt_rand(1000000000,9999999999),
      'ref_group' => $ref_group_level,
      'ref_level' => $ref_level
    ]);
    if($user){
			$agent = Agent::create([
				'user_id' => $user->id,
				'referal_user_id' => $data['referal_user_id'],
        'referal_user_code' => $data['referal_user_code'],
        'ref_group' => $ref_group_level,
        'ref_level' => $ref_level,
				'name_en' => $data['name_en'],
				'name_kh' => $data['name_kh'],
				'phone' => $data['phone'],
				'email' => $data['email'],
      ]);
		}
		$user->assignRole(3);
    return $user;
	}

	protected function redirectTo()
	{
    if(Auth::check()){
			if(Auth::user()->hasAnyRole(['Super-admin','Administer'])){
				$this->redirectTo = route('admin.dashboard');
				return $this->redirectTo;
			} else if(Auth::user()->hasAnyRole(['Agent','Member'])){
				$this->redirectTo = route('agent.dashboard');
				return $this->redirectTo;
			}
		}
	}

}
