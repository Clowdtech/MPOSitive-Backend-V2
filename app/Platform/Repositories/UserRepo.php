<?php

namespace App\Platform\Repositories;

use App\User as Model;
use App\Platform\Domains\User as Domain;

class UserRepo
{
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

	public function getLoggedIn()
	{
		return auth()->user();
	}
}