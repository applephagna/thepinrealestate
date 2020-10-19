<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingsController extends Controller
{
	public function index(Request $request)
	{
		$keyword = $request->get('search');
		$perPage = 25;
		if (!empty($keyword)) {
				$settings = Setting::where('key', 'LIKE', "%$keyword%")
						->orWhere('value', 'LIKE', "%$keyword%")
						->orderBy('key')->paginate($perPage);
		} else {
				$settings = Setting::orderBy('key')->paginate($perPage);
		}
		return view('admin.settings.index', compact('settings'));
	}

	public function create()
	{
		return view('admin.settings.create');
	}

	public function store(Request $request)
	{
		$this->validate(
				$request,
				[
						'key' => 'required|string|unique:settings',
						'value' => 'required'
				]
		);
		$requestData = $request->all();
		Setting::create($requestData);
		return redirect('admin/settings')->with('flash_message', 'Setting added!');
	}

	public function show($id)
	{
		$setting = Setting::findOrFail($id);
		return view('admin.settings.show', compact('setting'));
	}

	public function edit($id)
	{
		$setting = Setting::findOrFail($id);
		return view('admin.settings.edit', compact('setting'));
	}

	public function update(Request $request, $id)
	{
		$this->validate(
				$request,
				[
						'key' => 'required|string|unique:settings,key,' . $id,
						'value' => 'required'
				]
		);
		$requestData = $request->all();
		$setting = Setting::findOrFail($id);
		$setting->update($requestData);
		return redirect('admin/settings')->with('flash_message', 'Setting updated!');
	}

	public function destroy($id)
	{
		Setting::destroy($id);
		return redirect('admin/settings')->with('flash_message', 'Setting deleted!');
	}
}
