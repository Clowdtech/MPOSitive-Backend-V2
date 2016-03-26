<?php

namespace App\Platform\Repositories;

use App\Store as Model;
use App\Platform\Domains\Store as Domain;

class StoreRepo
{
	/**
	 * Create a new store record.
	 * 
	 * @param  App\Platform\Domains\Store $store
	 * @return mixed
	 */
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

	/**
	 * Find the store by it's id.
	 * 
	 * @param  int $id
	 * @return mixed
	 */
	public function find($id)
	{
		return Model::where('id', $id)->first();
	}

	/**
	 * Return the first record from the stores table.
	 * 
	 * @return mixed
	 */
	public function first()
	{
		return Model::first();
	}
}