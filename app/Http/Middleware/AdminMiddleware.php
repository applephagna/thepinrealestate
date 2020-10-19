<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\User;

class AdminMiddleware
{
	public function handle($request, Closure $next)
	{
        $user = User::all()->count();
        if (!($user == 1)) {
            if (!Auth::user()->hasPermissionTo('Administer roles & permissions')) //If user does //not have this permission
            {
              abort('403');
            }
        }
		// if(Auth::check()&& Auth::user()->role->id==1)
		// {
		// 	return $next($request);
		// } else {
		// 	return redirect()->route('login');
		// }
        return $next($request);
	}
}
