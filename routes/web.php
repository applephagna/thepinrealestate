<?php

// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

//for switching language route
	Route::get('/locale/{locale}',function($locale){
			Session::put('locale',$locale);
			return redirect()->back();
	});

// front page route
	Route::get('/','HomeController@index')->name('home');
	Route::post('/referal/check', 'CheckReferalController@check')->name('referal.check');
	Route::prefix('property')->group(function(){
		Route::get('/all-properties-in-{slug}','HomeController@property_by_province')->name('property.by.province');
		Route::get('/list_by_category','HomeController@listProperties')->name('property.by_category');
		Route::get('/allproperties','HomeController@allProperties')->name('property.allProperties');
		Route::get('/allproperties-grid','HomeController@allPropertiesGrid')->name('property.allProperties.grid');
		Route::get('/detail/{slug}','HomeController@showProperties')->name('property.show');
		Route::get('/search','HomeController@mainSearch')->name('property.mainSearch');
		Route::get('/search.html','HomeController@searchByCategory')->name('property.searchByCategory');
    Route::get('/{slug}','HomeController@property_by_type')->name('property.by.type');
	});

Auth::routes();
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('get-district-list','Agent\PostController@getDistrictList');
Route::get('get-commune-list','Agent\PostController@getCommuneList');
Route::get('get-district-search','HomeController@getDistrictSearch');
Route::get('get-commune-search','HomeController@getCommuneSearch');

// Agent Route
	Route::group(['as'=>'agent.','prefix'=>'agent','namespace'=>'Agent','middleware' =>['auth']],function (){
		Route::prefix('post')->group(function(){
			Route::get('/','PostController@index')->name('post.index');
			Route::get('/{id}/category={cat_id}','PostController@indexEdit')->name('post.indexEdit');
			Route::get('/category={cate_id}','PostController@create')->name('post.create');
			Route::post('/image_upload_tmp','PostController@store')->name('post.image.upload');
			Route::post('/image/rotate/{id}','PostController@rotate')->name('post.image.rotate');
			Route::post('/image/delete/{id}','PostController@delete')->name('post.image.delete');
			Route::post('/store','PostController@saveProperties')->name('post.store');
			Route::get('/property={pro_id}category={cat_id}','PostController@editProperties')->name('post.edit');
			Route::put('/{id}/update','PostController@updateProperties')->name('post.update');
			Route::post('/destroy','PostController@deleteProperties')->name('post.destroy');
			Route::get('/{slug}','PostController@showProperties')->name('post.show');
		});

		Route::get('/manage_ads', 'DashboardController@index')->name('dashboard');
		Route::get('/likes', 'DashboardController@index')->name('likes');
		Route::get('/notifications', 'DashboardController@index')->name('notifications');
		Route::get('/chats', 'DashboardController@index')->name('chats');
		Route::get('/setting', 'DashboardController@index')->name('setting');
		Route::get('/manage_ads/paid_ads', 'DashboardController@index')->name('paid_ads');
		Route::get('/manage_ads/expired_ads', 'DashboardController@index')->name('expired_ads');

	// member route
		Route::get('/profile','DashboardController@profile')->name('profile');
		Route::get('/edit-profile','DashboardController@editProfile')->name('edit-profile');
		Route::put('/update-profile/{userid}','DashboardController@updateProfile')->name('update-profile');
    Route::get('/change-password','DashboardController@changePassword')->name('change-password');
    Route::put('/update-password/{userid}','DashboardController@updatePassword')->name('update-password');
		Route::get('/store','DashboardController@store')->name('store');
		Route::get('/store-banner','DashboardController@storeBanner')->name('store-banner');
	});

// Admin Route
	Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware' =>['auth']],function (){
		Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('isAdmin');

	// General Settings Route
		Route::get('/settings/general/edit', 'WebmasterSettingController@editGeneral')->name('general.edit');
		Route::put('/settings/general/update', 'WebmasterSettingController@updateGeneral')->name('general.update');

	// activities logs
		Route::resource('/activitylogs', 'ActivityLogsController');
		Route::resource('/settings', 'SettingsController');
		Route::get('/generator', ['uses' => 'ProcessController@getGenerator']);
		Route::post('/generator', ['uses' => 'ProcessController@postGenerator']);

	// User Role & Permission Route
		Route::resource('users', 'UserController');
		Route::get('/profile','UserController@getProfile')->name('profile');
		Route::resource('roles', 'RoleController');
		Route::resource('permissions', 'PermissionController');
		Route::resource('properties', 'PropertyController');
		Route::resource('categories', 'CategoryController');

	// Product routes
		Route::resource('products','ProductController');
		Route::get('dropzone/upload','ProductController@dropzone')->name('upload.dropzone');
		Route::post('dropzone/upload','ProductController@dropzoneStore')->name('upload.dropzone.store');
		Route::post('dropzone/delete', 'ProductController@dropzonedelete')->name('upload.dropzone.delete');
		Route::get('dropzone/gallery-list', 'ProductController@gallery_list')->name('upload.dropzone.list');

		Route::resource('mails', 'MailController');

		Route::get('/upload', 'DropZoneController@upload')->name('dropzone.create');
		Route::post('/upload/store', 'DropZoneController@store')->name('dropzone.store');
		Route::post('/delete', 'DropZoneController@delete')->name('dropzone.delete');
		Route::resource('images','ImageController');

	//Route Report
		Route::get('/report/agent','ReportController@agent')->name('report.agent');
    Route::get('/report/property','ReportController@property')->name('report.property');
    Route::get('report/agent/management','AgentManagementController@agentChart')->name('agent.chart');
    Route::get('agent/list','AgentManagementController@index')->name('agent.list');
    Route::get('agent/create','AgentManagementController@create')->name('agent.create');
    Route::post('agent/store','AgentManagementController@store')->name('agent.store');
    Route::get('agent/management-json/{user_id}','AgentManagementController@agent_json')->name('agent.json');
	});
	Route::get('/backup','Admin\BackupController@backup');

//Clear Cache facade value:
Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('cache:clear');
	return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
	$exitCode = Artisan::call('optimize');
	return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
	$exitCode = Artisan::call('route:cache');
	return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
	$exitCode = Artisan::call('route:clear');
	return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
	$exitCode = Artisan::call('view:clear');
	return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
	$exitCode = Artisan::call('config:cache');
	return '<h1>Clear Cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-clear', function() {
	$exitCode = Artisan::call('config:clear');
	return '<h1>Clear Config cleared</h1>';
});

Route::get('/insert/user', function() {
	$exitCode = Artisan::call('db:seed');
	return '<h1>User has been inserted Successful</h1>';
});
// copy data from one table to another table
// Route::get('/multi_update',function(){
// 	$districts = DB::table('provinces')->get();
// 	foreach ($districts as $key => $value) {
// 		$data2[] = array(
//             'name_en' => $value->name_en,
// 			'en' => $value->name_en,
// 			'kh' => $value->name_kh,
// 			'slug' => Str::slug($value->name_en),
// 		);
// 	}
//     return $data2;
// 	DB::table('provinces1')->insert($data2);
// 	return "Data has been insert";
// });
