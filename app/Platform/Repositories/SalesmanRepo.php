<?php

namespace App\Platform\Repositories;

use App\Salesman as Model;
use App\Platform\Domains\Salesman as Domain;

class SalesmanRepo
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