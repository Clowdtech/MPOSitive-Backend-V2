<?php

namespace App\Platform\Repositories;

use App\Store as Model;
use App\Platform\Domains\Store as Domain;

class StoreRepo
{
	public function create(Domain $store)
	{
		return Model::create([
			'name'		=>	$store->name,
			'uid'		=>	$store->uid,
			'address'		=>	$store->address,
			'latitude'		=>	$store->latitude,
			'longitude'		=>	$store->longitude,
			'user_id'		=>	$store->user->id,
			'category_id'		=>	$store->category->id,
		]);
	}

	public function find($id)
	{
		return Model::where('id', $id)->first();
	}

	public function first()
	{
		return Model::first();
	}
}