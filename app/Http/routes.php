<?php

// ----------------- Visitor Facing ----------------- 
Route::group(['middleware' => 'web'], function(){
	
	Route::get('/', [
		'uses'	=>	'\App\Http\Controllers\Visitor\HomeController@getIndex',
		'as'	=>	'VisitorHomePage'
	]);

	Route::get('sign-in', [
		'uses'	=>	'\App\Http\Controllers\Visitor\AuthController@getSignIn',
		'as'	=>	'VisitorClientSignInPage'
	]);

	Route::post('sign-in', [
		'uses'	=>	'\App\Http\Controllers\Visitor\AuthController@postSignIn',
		'as'	=>	'VisitorClientSignInRoute'
	]);

});
// ------------------------ // ---------------------- 

// ----------------- Customer Facing ----------------- 
Route::group(['middleware' => ['web', 'auth']], function(){

	Route::get('account', [
		'uses'	=>	'\App\Http\Controllers\Customer\HomeController@getIndex',
		'as'	=>	'CustomerHomePage'
	]);

	Route::get('stores', [
		'uses'	=>	'\App\Http\Controllers\Customer\StoreController@getIndex',
		'as'	=>	'CustomerStorePage'
	]);

	Route::get('store/{id}/devices', [
		'uses'	=>	'\App\Http\Controllers\Customer\StoreController@getDevices',
		'as'	=>	'CustomerStoreDevicesPage'
	]);

	
	
});