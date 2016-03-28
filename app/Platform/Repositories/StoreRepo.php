<?php

namespace App\Platform\Repositories;

use App\Store as Model;
use App\Platform\Domains\Store as Domain;

use App\Platform\Repositories\Repository;

class StoreRepo extends Repository
{
	public function __construct()
	{
		parent::__construct();
	}

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
			'slug'		=>	$store->slug,
			'uid'		=>	$store->uid,
			'address'		=>	$store->address,
			'latitude'		=>	$store->latitude,
			'longitude'		=>	$store->longitude,
			'user_id'		=>	$store->user->id,
			'category_id'		=>	$store->category->id,
		]);
	}

	/**
	 * Return users stores.
	 * 
	 * @param  int 	$userId
	 * @return mixed
	 */
	public function getUsersStores($userId)
	{
		return Model::where('user_id', $userId)->get();
	}

	/**
	 * Find a store by slug.
	 * 
	 * @param  int $storeId
	 * @param  string 	$slug
	 * @return 
	 */
	public function findBySlug($userId, $slug)
	{
		$data = Model::where('user_id', $userId)->where('slug', $slug)->first();
		
		return $this->ifNotEmpty($data, $slug . ' slug doesn\'t exist.');
	}

	/**
	 * Find a store by name.
	 * 
	 * @param  int $storeId
	 * @param  string 	$slug
	 * @return 
	 */
	public function findByName($userId, $name)
	{
		return Model::where('user_id', $userId)->where('name', $name)->first();
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