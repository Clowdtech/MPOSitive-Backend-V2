<?php

namespace App\Platform\Repositories;

use App\StoreProduct as Model;
use App\Platform\Domains\StoreProduct as Domain;

class StoreProductRepo
{
	public function create(Domain $product)
	{
		return Model::create([
			'qty'	=>	$product->qty,
			'uid'	=>	$product->uid,
			'store_id'	=>	$product->store->id,
			'product_id'	=>	$product->product->id,
			'active'	=>	$product->active,
		]);
	}

	/**
	 * Return first record from the salesmen table.
	 * 
	 * @return mixed
	 */
	public function first()
	{
		return Model::first();
	}
}