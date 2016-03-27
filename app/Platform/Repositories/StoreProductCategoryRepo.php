<?php

namespace App\Platform\Repositories;

use App\StoreProductCategory as Model;
use App\Platform\Domains\StoreProductCategory as Domain;

class StoreProductCategoryRepo
{
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