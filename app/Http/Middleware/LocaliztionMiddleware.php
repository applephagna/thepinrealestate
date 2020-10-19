<?php

namespace App\Http\Middleware;

use Closure;

class LocaliztionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Session::has('locale')){
            \App::setLocale(\Session::get('locale'));
            //The default Language in Config/App.php is English
          }
          return $next($request);
    }
}
