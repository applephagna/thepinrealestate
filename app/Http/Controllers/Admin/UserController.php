<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Models\Agent;
use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use App\Traits\UploadScope;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\AddValidation;
use App\Http\Requests\User\EditValidation;

class UserController extends Controller
{
  protected $folder_path;
  protected $folder_name = 'user/profile';

  use UploadScope;

  public function __construct()
  {
    $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    $this->folder_path = public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$this->folder_name.DIRECTORY_SEPARATOR;
  }

  public function index()
  {
    // $user_referal_user_code = '998877665505';
    // $user_referal_user_code1 = '91022613955';
    // $user_referal_user_code2 = '81909147235';
    // $user_referal_user_code3 = '58741791065';
    // if($user_referal_user_code == '99887766550'){
    //   $level = "G1-";
    // }
    // if ($user_referal_user_code1 == '9102261395' | $user_referal_user_code2 == '8190914723'| $user_referal_user_code3 == '5874179106'){
    //   $level = "G2-";
    // }
    // return $level;
    // $usercount = \DB::table('agents')
    //               ->where('referal_user_code','9988776655')
    //               ->count();
    // return $usercount;
    //Get all users and pass it to the view
    if(Auth::check()){
      if(Auth::user()->hasAnyRole(['Super-admin'])){
        if (!$data['users'] = User::all()){
          return $this->invalidRequest();
        }
      } else if(Auth::user()->hasAnyRole(['Administer','Agent','Member'])){
        if (!$data['users'] = User::where('id','<>',1)->get()){
          return $this->invalidRequest();
        }
      }
    }
    return view('admin.users.index',$data);
  }

  public function create()
  {
    //Get all roles and pass it to the view
    $data['provinces'] = Province::pluck('name_en','id');
    if(Auth::check()){
      if(Auth::user()->hasAnyRole(['Super-admin'])){
        if (!$data['roles'] = Role::all()){
          return $this->invalidRequest();
        }
      } else if(Auth::user()->hasAnyRole(['Administer','Agent','Member'])){
        if (!$data['roles'] = Role::where('id','<>',1)->get()){
          return $this->invalidRequest();
        }
      }
    }
    return view('admin.users.create',$data);
  }

  public function store(AddValidation $request)
  {
    $referal_code = $request->referal_code;
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
    if ($request->hasFile('photo')){
      $image_name = $this->uploadImages($request, 'photo');
    }else{
      $image_name = "";
    }
    $datas = [
      'name_en' => $request->name_en,
      'name_kh' => $request->name_kh,
      'username' => $request->username,
      'referal_code' => mt_rand(1000000000,9999999999),
      'ref_group' => $ref_group_level,
      'ref_level' => $ref_level,
      'phone' => $request->phone,
      'phone1' => $request->phone1,
      'phone2' => $request->phone2,
      'email' => $request->email,
      'address' => $request->address,
      'province_id' => $request->province_id,
      'district_id' => $request->district_id,
      'commune_id' => $request->commune_id,
      'password' =>  Hash::make($request->password),
      'photo' => $image_name
    ];
    $user = User::create($datas);
    if($user){
      Agent::create([
        'user_id' =>$user->id,
        'referal_user_id' =>$request->referal_user_id,
        'referal_user_code' =>$request->referal_user_code,
        'ref_group' => $ref_group_level,
        'ref_level' => $ref_level,
        'name_en' =>$request->name_en,
        'name_kh' =>$request->name_kh,
        'job_title' =>$request->job_title,
        'phone' => $request->phone,
        'phone1' => $request->phone1,
        'phone2' => $request->phone2,
        'email' => $request->email,
        'address' =>$request->address,
        'photo' =>$image_name,
      ]);
    }
    $roles = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
    if (isset($roles)) {
      foreach ($roles as $role) {
        $role_r = Role::where('id', '=', $role)->firstOrFail();
        $user->assignRole($role_r); //Assigning role to user
      }
    }
    //Redirect to the users.index view and display message
    return redirect()->route('admin.users.index')
        ->with(
            'flash_message',
            'User successfully added.'
        );
  }

  public function show($id)
  {
    $user = User::findOrFail($id);
    return view('admin.users.show', compact('user'));
  }

  public function edit($id)
  {
    //Get all users and pass it to the view
    if(Auth::check()){
      if(Auth::user()->hasAnyRole(['Super-admin'])){
        if (!$data['row'] = User::find($id)){
          return $this->invalidRequest();
        }
      } else if(Auth::user()->hasAnyRole(['Administer','Agent','Member'])){
        if (!$data['row'] = User::where('id','<>','1')->find($id)){
          return $this->invalidRequest();
        }
      }
      if(Auth::user()->hasAnyRole(['Super-admin'])){
        if (!$data['roles'] = Role::all()){
          return $this->invalidRequest();
        }
      } else if(Auth::user()->hasAnyRole(['Administer','Agent','Member'])){
        if (!$data['roles'] = Role::where('id','<>',1)->get()){
          return $this->invalidRequest();
        }
      }
    };
    $data['provinces'] =Province::pluck('name_en','id');
    $data['districts'] =District::where('province_id',$data['row']->province_id)->get();
    $data['communes'] =Commune::where('district_id',$data['row']->district_id)->get();
    $data['active_roles'] = $data['row']->roles()->pluck('id', 'id')->toArray();
    return view('admin.users.edit',$data ); //pass user and roles data to view
  }

  public function update(EditValidation $request, $id)
  {
    $user = User::with('agent')->findOrFail($id); //Get role specified by id
    if ($request->hasFile('photo')) {
      $image_name = $this->uploadImages($request, 'photo');
      // remove old image from folder
      if (file_exists($this->folder_path.$user->photo)){
        @unlink($this->folder_path.$user->photo);
      }
    } else {
      $image_name = $user->photo;
    }
    $data_nopass =[
      'name_en' => $request->name_en,
      'name_kh' => $request->name_kh,
      'username' => $request->username,
      'referal_code' => $request->referal_code,
      'phone' => $request->phone,
      'phone1' => $request->phone1,
      'phone2' => $request->phone2,
      'email' => $request->email,
      'address' => $request->address,
      'province_id' => $request->province_id,
      'district_id' => $request->district_id,
      'commune_id' => $request->commune_id,
      'photo' => $image_name
    ];
    $data_pass=[
      'name_en' => $request->name_en,
      'name_kh' => $request->name_kh,
      'username' => $request->username,
      'referal_code' => $request->referal_code,
      'phone' => $request->phone,
      'phone1' => $request->phone1,
      'phone2' => $request->phone2,
      'email' => $request->email,
      'address' => $request->address,
      'province_id' => $request->province_id,
      'district_id' => $request->district_id,
      'commune_id' => $request->commune_id,
      'password' =>  Hash::make($request->password),
      'photo' => $image_name
    ];
    $data_agent =[
      'user_id' =>$user->id,
      'referal_user_id' =>$request->referal_user_id,
      'referal_user_code' =>$request->referal_user_code,
      'name_en' =>$request->name_en,
      'name_kh' =>$request->name_kh,
      'job_title' =>$request->job_title,
      'phone' => $request->phone,
      'phone1' => $request->phone1,
      'phone2' => $request->phone2,
      'email' => $request->email,
      'address' =>$request->address,
      'photo' =>$image_name,
    ];
    $newPassword = $request->get('password');
    if(empty($newPassword)){
      $user->update($data_nopass);
    } else {
      $user->update($data_pass);
    }
    Agent::where('user_id',$id)->update($data_agent);
    $roles = $request['roles']; //Retreive all roles
    if (isset($roles)) {
      $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
    } else {
      $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
    }
    return redirect()->route('admin.users.index')
        ->with(
          'flash_message',
          'User successfully edited.'
        );
  }

  public function destroy($id)
  {
    //Find a user with a given id and delete
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.users.index')
        ->with(
            'flash_message',
            'User successfully deleted.'
        );
  }

  protected function invalidRequest($message = 'Invalid request!!')
  {
    request()->session()->flash($this->message_warning, $message);
    return redirect()->route('users.index');
  }

  public function getProfile()
  {
    return view('admin.users.profile');
  }
}
