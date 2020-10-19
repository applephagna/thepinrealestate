<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class AgentManagementController extends Controller
{
	public function agentChart()
	{
    $admin = User::whereIn('id',[1])->select('id as user_id','name_en','referal_code as referal_user_code','ref_level','phone','photo')->get()->toArray();
		$agent = Agent::get()->toArray();
		$arr_merge =  array_merge($admin,$agent);
		return view('admin.agent_management.agent_chart',compact('arr_merge'));
	}

	public function index()
	{
		$data['agents'] = Agent::get();
		return view('admin.agent_management.agent_list',$data);
  }

	public function create()
	{
		return view('admin.agent_management.create');
	}

	public function store(Request $request)
	{
    $user = DB::table('agents')->latest('user_id')->first();
    $user_id=$user->user_id;
		$request->validate([
			'referal_user_id' => ['required'],
			'name_en' => ['required', 'string','max:30'],
			'name_kh' => ['required', 'string','max:30'],
			'phone' => ['required', 'string','max:15', 'unique:agents'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:agents'],
			'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$datas = [
			'user_id' => $user_id+1,
			'referal_user_id' => $request->referal_id,
			'referal_user_code' => $request->referal_user_id,
			'name_en' => $request->name_en,
			'name_kh' => $request->name_kh,
			'job_title' => $request->job_title,
			'phone' => $request->phone,
			'email' => $request->email,
			'address' => $request->address,
			'photo' => $request->photo,
			// 'description' => $request,
			// 'phone1' => $request,
			// 'phone2' => $request,
			// 'phone3' => $request,
			// 'phone4' => $request,
			// 'facebook' => $request,
			// 'twitter' => $request,
			// 'pinterest' => $request,
			// 'linkedin' => $request,
        ];
        return $datas;
		Agent::create($datas);
		return redirect(route('admin.agent.list'))->with('success','New Agent Registration Successfully!');
	}

	public function user_referal($user_id)
	{
		if($user_id){
			return Agent::where('referal_user_id',$user_id)->get()->map(function($row){
				$row->photo = asset('uploads/user/profile/'.$row->photo);
				$row['children']  = $this->user_referal($row->user_id);
				return $row;
			})->toArray();
		}
	}

  public function agent_json($user_id)
  {
		$user = User::where('id',$user_id)->select('id as user_id','name_en','referal_code as referal_user_code','ref_level','phone','photo')->get()->map(function($row){
				$row->photo = asset('uploads/user/profile/'.$row->photo);
				return $row;
		})->first();
		$user['children'] = $this->user_referal($user_id);
		return $user;
	}

}
