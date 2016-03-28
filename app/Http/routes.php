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

	Route::get('account/me', [
		'uses'	=>	'\App\Http\Controllers\Customer\HomeController@getAccount',
		'as'	=>	'CustomerAccountPage'
	]);

	Route::get('stores', [
		'uses'	=>	'\App\Http\Controllers\Customer\StoreController@getIndex',
		'as'	=>	'CustomerStorePage'
	]);

	Route::get('stores/{slug}', [
		'uses'	=>	'\App\Http\Controllers\Customer\StoreController@getSingleStore',
		'as'	=>	'CustomerSingleStorePage'
	]);

	Route::get('stores/{slug}/devices', [
		'uses'	=>	'\App\Http\Controllers\Customer\StoreController@getDevices',
		'as'	=>	'CustomerStoreDevicesPage'
	]);
	
	Route::get('stores/{slug}/products', [
		'uses'	=>	'\App\Http\Controllers\Customer\StoreController@getProducts',
		'as'	=>	'CustomerStoreProductsPage'
	]);

	Route::get('stores/{slug}/products/{productid}', [
		'uses'	=>	'\App\Http\Controllers\Customer\StoreController@getSingleProduct',
		'as'	=>	'CustomerStoreSingleProductPage'
	]);
	
});