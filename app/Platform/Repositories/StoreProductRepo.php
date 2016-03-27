<?php

namespace App\Platform\Repositories;

use App\StoreProduct as Model;
use App\Platform\Domains\StoreProduct as Domain;

class StoreProductRepo
{
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