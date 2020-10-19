<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityLogsController extends Controller
{
	public function index(Request $request)
	{
			$keyword = $request->get('search');
			$perPage = 25;
			if (!empty($keyword)) {
					$activitylogs = Activity::where('description', 'LIKE', "%$keyword%")
							->latest()->paginate($perPage);
			} else {
					$activitylogs = Activity::latest()->paginate($perPage);
			}
			return view('admin.activitylogs.index', compact('activitylogs'));
	}

	public function show($id)
	{
			$activitylog = Activity::findOrFail($id);
			return view('admin.activitylogs.show', compact('activitylog'));
	}

	public function destroy($id)
	{
			Activity::destroy($id);
			return redirect('admin/activitylogs')->with('flash_message', 'Activity deleted!');
	}

}
