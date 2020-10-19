<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
	public function __construct()
	{
			$this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
	}

	public function index()
	{
			$permissions = Permission::all(); //Get all permissions
			return view('admin.permissions.index')->with('permissions', $permissions);
	}

	public function create()
	{
			$roles = Role::get(); //Get all roles
			return view('admin.permissions.create')->with('roles', $roles);
	}

	public function store(Request $request)
	{
		// return $request->all();
			$this->validate($request, [
					'name' => 'required|max:40',
			]);
			$name = $request['name'];
			$permission = new Permission();
			$permission->group = $request['group'];
			$permission->name = $name;
			$permission->display_name = $request['display_name'];
			$permission->description = $request['description'];
			// $roles = $request['roles'];
			$permission->save();
			// if (!empty($request['roles'])) { //If one or more role is selected
			// 		foreach ($roles as $role) {
			// 				$r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

			// 				$permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
			// 				$r->givePermissionTo($permission);
			// 		}
			// }
			return redirect()->route('admin.permissions.index')
					->with(
							'flash_message',
							'Permission' . $permission->name . ' added!'
					);
	}

	public function show($id)
	{
			return redirect('permissions');
	}

	public function edit($id)
	{
			$permission = Permission::findOrFail($id);
			return view('admin.permissions.edit', compact('permission'));
	}

	public function update(Request $request, $id)
	{
			$permission = Permission::findOrFail($id);
			$this->validate($request, [
					'name' => 'required|max:40',
			]);
			$input = $request->all();
			$permission->fill($input)->save();

			return redirect()->route('admin.permissions.index')
					->with(
							'flash_message',
							'Permission' . $permission->name . ' updated!'
					);
	}

	public function destroy($id)
	{
			$permission = Permission::findOrFail($id);
			//Make it impossible to delete this specific permission
			if ($permission->name == "Administer roles & permissions") {
					return redirect()->route('admin.permissions.index')
							->with(
									'flash_message',
									'Cannot delete this Permission!'
							);
			}
			$permission->delete();
			return redirect()->route('admin.permissions.index')
					->with(
							'flash_message',
							'Permission deleted!'
					);
	}

}
