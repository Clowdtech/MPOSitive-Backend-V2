<?php

namespace App\Platform\Repositories;

use App\User as Model;
use App\Platform\Domains\User as Domain;

class UserRepo
{
	/**
	 * Create a new user record.
	 * 
	 * @param  App\Platform\Domains\User $user
	 * @return mixed
	 */
	public function create(Domain $user)
	{
		return Model::create([
			'name'		=>	$user->name,
			'email'		=>	$user->email,
			'password'	=>	$user->password,
			'uid'		=>	$user->uid,
			'salesman_id'		=>	$user->salesman->id,
		]);
	}

	/**
	 * Find the user by it's id.
	 * 
	 * @param  int $id
	 * @return mixed
	 */
	public function find($id)
	{
		return Model::where('id', $id)->first();
	}

	/**
	 * Return the logged in user.
	 * 
	 * @return mixed
	 */
	public function getLoggedIn()
	{
		return auth()->user();
	}
}