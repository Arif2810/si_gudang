<?php

// Route::get('/', function(){
//   return view('welcome');
// });

Auth::routes();
Route::any('register', function(){
	return abort(404);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
//=========================================================================
Route::group(['middleware'=>'auth'], function(){
	Route::resource('employee', 'EmployeeController');
	Route::get('/employee/{id_karyawan}/show', 'EmployeeController@show');
	//=========================================================================
	Route::resource('product', 'ProductController');
	Route::get('/product/{id_produk}/show', 'ProductController@show');
	//=========================================================================
	Route::get('/sell', 'SellController@index')->name('sell.index');
	Route::post('/sell', 'SellController@store')->name('sell.store');
	Route::get('/sell/update', 'SellController@update')->name('sell.update');
	Route::delete('/sell/{id_sell}', 'SellController@destroy');
	Route::get('/sell/laporan', 'SellController@report')->name('sell.report');
	//=========================================================================
	Route::resource('/report', 'ReportController');
	//=========================================================================
	Route::get('/purchase', 'PurchaseController@index')->name('purchase.index');
	Route::post('/purchase', 'PurchaseController@store')->name('purchase.store');
	Route::get('/purchase/update', 'PurchaseController@update')->name('purchase.update');
	Route::delete('/purchase/{id_sell}', 'PurchaseController@destroy');
	Route::get('/purchase/laporan', 'PurchaseController@report')->name('purchase.report');
	//=========================================================================
	Route::resource('/report2', 'Report2Controller');
	//=========================================================================
	// Route::resource('schedule', 'ScheduleController');
	// Route::get('/schedule/{id_jadwal}/show', 'ScheduleController@show');
	// Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');
	// Route::get('/schedule/create', 'ScheduleController@create')->name('schedule.create');
	// Route::post('/schedule', 'ScheduleController@store');
	// Route::get('/schedule/{id_jadwal}/edit', 'ScheduleController@edit');
	// Route::put('/schedule/{id_jadwal}', 'ScheduleController@update');
	// Route::delete('/schedule/{id_jadwal}', 'ScheduleController@destroy');
	//=========================================================================
	Route::resource('supplier', 'SupplierController');
	Route::get('/supplier/{id_supplier}/show', 'SupplierController@show');
	//=========================================================================
	Route::get('/setting', 'UserSettingController@form')->name('user.setting');
	Route::post('/setting', 'UserSettingController@update');
	//=========================================================================
	Route::group(['middleware'=>'akses.admin'], function(){
		Route::resource('category', 'CategoryController');
		Route::resource('unit', 'UnitController');
		Route::resource('user', 'UserController');
		Route::resource('agama', 'AgamaController');
		Route::resource('venue', 'VenueController');
		Route::resource('gender', 'GenderController');
	});
	// Route::get('/user', 'UserController@index')->name('user.index')->middleware('akses.admin');
	//=========================================================================

	Route::get('/about', function(){
		return view('gudang.about');
	});
});
