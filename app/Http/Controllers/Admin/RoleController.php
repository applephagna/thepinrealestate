<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

	public function __construct()
	{
			$this->middleware(['auth', 'isAdmin']);
			//isAdmin middleware lets only users with a //specific permission permission to access these resources
	}

	public function index()
	{
			$roles = Role::all(); //Get all roles
			return view('admin.roles.index',compact('roles'));
	}

	public function create()
	{
		$data = [];
		$permissions = Permission::all(); //Get all permissions
		$data['permission'] = $permissions->groupBy('group');
		return view('admin.roles.create',compact('data'));
	}

	public function store(Request $request)
	{
		//Validate name and permissions field
		$this->validate(
			$request,
				[
					'name' => 'required|unique:roles|max:15',
					'permissions' => 'required',
				]
		);
		$name = $request['name'];
		$role = new Role();
		$role->name = $name;
		$role->display_name = $request['display_name'];
		$role->description = $request['description'];
		$permissions = $request['permissions'];
		$role->save();
		//Looping thru selected permissions
		foreach ($permissions as $permission) {
				$p = Permission::where('id', '=', $permission)->firstOrFail();
				//Fetch the newly created role and assign permission
				$role = Role::where('name', '=', $name)->first();
				$role->givePermissionTo($p);
		}
		alert()->success('Create new role','Rose has been Created');
		return redirect()->route('admin.roles.index')
				->with(
						'flash_message',
						'Role' . $role->name . ' added!'
				);
	}

	public function show($id)
	{
			return redirect('roles');
	}

	public function edit($id)
	{
		$data = [];
		$data['row'] = Role::findOrFail($id);
		$permissions = Permission::all();
		$data['permission'] = $permissions->groupBy('group');
		$data['role_permission'] = $data['row']->permissions()->pluck('id','id')->toArray();
		return view('admin.roles.edit', compact('data'));
	}

	public function update(Request $request, $id)
	{
		// return $request->all();
			$role = Role::findOrFail($id); //Get role with the given id
			// //Validate name and permission fields
			$this->validate($request, [
					'name' => 'required|max:15|unique:roles,name,' . $id,
					'permissions' => 'required',
			]);
			$role->name = $request->name;
      $role->display_name = $request->display_name;
      $role->description = $request->description;
      $role->save();
			$permissions = $request['permissions'];
			$p_all = Permission::all(); //Get all permissions
			foreach ($p_all as $p) {
				$role->revokePermissionTo($p); //Remove all permissions associated with role
			}
			foreach ($permissions as $permission) {
					$p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form //permission in db
					$role->givePermissionTo($p);  //Assign permission to role
			}
			alert()->success('Edit new role','Rose has been Updated');
			return redirect()->route('admin.roles.index')
					->with(
							'flash_message',
							'Role' . $role->name . ' updated!'
					);


	}

	public function destroy($id)
	{
			$role = Role::findOrFail($id);
			$role->delete();
			return redirect()->route('admin.roles.index')
					->with(
							'flash_message',
							'Role deleted!'
					);
	}
}
