<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	public function register()
	{
			//
	}

	public function boot()
	{
		Schema::defaultStringLength(191);
		view()->composer('*', function($view) {
			$view->with('categories', \App\Models\Category::categories());
			$view->with('bedrooms', \App\Models\Bedroom::pluck('slug','room'));
			$view->with('bathrooms', \App\Models\Bathroom::pluck('slug','room'));
			$view->with('facings', \App\Models\Facing::pluck('facing','id'));
		});
	}
}
