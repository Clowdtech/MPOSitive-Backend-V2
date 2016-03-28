<?php

// ----------------- Visitor Facing ----------------- 
Route::group(['middleware' => 'web'], function(){
	
	Route::get('/', [
		'uses'	=>	'\App\Http\Controllers\Visitor\HomeController@getIndex',
		'as'	=>	'VisitorHomePage'
	]);

	Route::get('/sign-in', [
		'uses'	=>	'\App\Http\Controllers\Visitor\AuthController@getSignIn',
		'as'	=>	'VisitorClientSignInPage'
	]);

});