<?php

namespace App\Platform\Repositories;

use App\ProductCategory as Model;
use App\Platform\Domains\ProductCategory as Domain;

class ProductCategoryRepo
{
	public function create(Domain $category)
	{
		return Model::create([
			'name'	=>	$category->name,
			'active'	=>	$category->active,
			'user_id'	=>	$category->user->id,
			'store_id'	=>	$category->store->id,
		]);
	}

	public function first()
	{
		return Model::first();
	}
}