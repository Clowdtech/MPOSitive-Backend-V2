<?php

namespace App\Platform\Repositories;

use App\ProductCategory as Model;
use App\Platform\Domains\ProductCategory as Domain;

class ProductCategoryRepo
{
	/**
	 * Create product category.
	 * 
	 * @param  App\Platform\Domains\ProductCategory $category
	 * @return mixed
	 */
	public function create(Domain $category)
	{
		return Model::create([
			'name'	=>	$category->name,
			'active'	=>	$category->active,
			'user_id'	=>	$category->user->id,
		]);
	}

	/**
	 * Return first record from the table.
	 * 
	 * @return mixed
	 */
	public function first()
	{
		return Model::first();
	}
}