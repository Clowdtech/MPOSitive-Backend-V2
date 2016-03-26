<?php

namespace App\Platform\Repositories;

use App\StoreCategory as Model;
use App\Platform\Domains\StoreCategory as Domain;

class StoreCategoryRepo
{
	/**
	 * Create a new store category.
	 * 
	 * @param  App\Platform\Domains\StoreCategory $category
	 * @return mixed
	 */
	public function create(Domain $category)
	{
		return Model::create([
			'name'		=>	$category->name,
			'active'		=>	$category->active,
		]);
	}

	/**
	 * Find the store category by it's id.
	 * 
	 * @param  int $id
	 * @return mixed
	 */
	public function find($id)
	{
		return Model::where('id', $id)->first();
	}

	/**
	 * Return first record from store_categories table.
	 * 
	 * @return mixed
	 */
	public function first()
	{
		return Model::first();
	}
}