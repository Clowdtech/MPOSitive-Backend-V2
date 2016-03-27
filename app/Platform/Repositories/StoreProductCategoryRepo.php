<?php

namespace App\Platform\Repositories;

use App\StoreProductCategory as Model;
use App\Platform\Domains\StoreProductCategory as Domain;

class StoreProductCategoryRepo
{

	public function create(Domain $category)
	{
		return Model::create([
			'active'	=>	$category->active,
			'store_id'	=>	$category->store->id,
			'product_category_id'	=>	$category->storeProductCategory->id,
		]);
	}
	/**
	 * Return first record from the store_product_categories table.
	 * 
	 * @return mixed
	 */
	public function first()
	{
		return Model::first();
	}
}