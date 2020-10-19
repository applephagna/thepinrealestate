<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\UploadScope;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
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
		//Get all properties and pass it to the view
    $data['properties'] = Property::with(['category','parent','province','district','commune'])->get();
		return view('admin.properties.index',$data);
	}

	public function create()
	{
		//Get all roles and pass it to the view
		$data = [];
		$data['roles'] = Role::get();
		return view('admin.properties.create',compact('data'));
	}

	public function store(AddValidation $request)
	{
		if ($request->hasFile('photo')){
			$image_name = $this->uploadImages($request, 'photo');
		}else{
			$image_name = "";
		}
		$user = User::create(['name_en' => $request->name,
													'email' => $request->email,
													'password' => $request->password,
													'phone' => $request->phone,
													'address' => $request->address,
													'photo' =>  $image_name
												]);

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
		return view('admin.properties.show', compact('user'));
	}

	public function edit($id)
	{
		$data = [];
		if(auth()->user()->id == 1){
			if (!$data['row'] = User::find($id)){
				return $this->invalidRequest();
			}
		}else{
			if (!$data['row'] = User::where('id','<>','1')->find($id)){
				return $this->invalidRequest();
			}
		}
		$data['roles'] = Role::all();
		$data['active_roles'] = $data['row']->roles()->pluck('id', 'id')->toArray();
		return view('admin.properties.edit', compact('data')); //pass user and roles data to view
	}

	public function update(EditValidation $request, $id)
	{
		$user = User::findOrFail($id); //Get role specified by id
		if ($request->hasFile('photo')) {
			$image_name = $this->uploadImages($request, 'photo');
			// remove old image from folder
			if (file_exists($this->folder_path.$user->photo))
				@unlink($this->folder_path.$user->photo);
		} else {
				 $image_name = $user->photo;
		}
		$newPassword = $request->get('password');
		if(empty($newPassword)){
			$user->update(['name_en' => $request->firstname,
									 'email' => $request->email,
									 'phone' => $request->phone,
									 'address' => $request->address,
									 'photo' =>  $image_name
								 ]);
		}else{
			$user->update(['name_en' => $request->firstname,
									 'email' => $request->email,
									 'password' => $newPassword,
									 'phone' => $request->phone,
									 'address' => $request->address,
									 'photo' =>  $image_name
								 ]);
		}
		$roles = $request['roles']; //Retreive all roles
		if (isset($roles)) {
				$user->roles()->sync($roles);  //If one or more role is selected associate user to roles
		} else {
				$user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
		}
		return redirect()->route('admin.properties.index')
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
		return redirect()->route('admin.properties.index')
				->with(
						'flash_message',
						'User successfully deleted.'
				);
	}

	protected function invalidRequest($message = 'Invalid request!!')
	{

	}
}
