<?php

namespace App\Http\Controllers\Auth;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	// protected $redirectTo = RouteServiceProvider::HOME;
	// protected $redirectTo;

	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function showLoginForm()
	{
		$categories = Category::where(['parent_id'=>0])->get();
		return view('auth.login',compact('categories'));
	}

	protected function credentials(Request $request)
	{
		if(is_numeric($request->get('email'))){
			return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
		}
		elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
			return ['email' => $request->get('email'), 'password'=>$request->get('password')];
		}
		return ['username' => $request->get('email'), 'password'=>$request->get('password')];
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
