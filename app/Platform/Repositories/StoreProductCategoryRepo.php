<?php

namespace App\Platform\Repositories;

use App\StoreProductCategory as Model;
use App\Platform\Domains\StoreProductCategory as Domain;

class StoreProductCategoryRepo
{
	/**
	 * Create a new store product category.
	 * 
	 * @param  App\Platform\Domains\StoreProductCategory  $category
	 * @return mixed
	 */
	public function create(Domain $category)
	{
		return Model::create([
			'active'	=>	$category->active,
			'store_id'	=>	$category->store->id,
			'product_category_id'	=>	$category->storeProductCategory->id,
		]);
	}

	/**
	 * Get all active product categories.
	 * 
	 * @return array
	 */
	public function getActive()
	{
		$ret = [];
		foreach (Model::where('active', 1)->get() as $v) {
			$ret[] = $v->categories;
		}

		return $ret;
	}

	/**
	 * Get all stores product categories.
	 * 
	 * @return array
	 */
	public function getByStore($storeId, $active = true)
	{
		$ret = [];
		foreach (Model::where('store_id', $storeId)->get() as $v) {
			$ret[] = $v->categories;
		}

		return $ret;
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