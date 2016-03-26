<?php

namespace App\Platform\Repositories;

use App\Store as Model;
use App\Platform\Domains\Store as Domain;

class StoreRepo
{
	public function create(Domain $store)
	{
		// return Model::create([
		// 	'name'		=>	$user->name,
		// 	'email'		=>	$user->email,
		// 	'password'	=>	$user->password,
		// 	'uid'		=>	$user->uid,
		// ]);
	}
}