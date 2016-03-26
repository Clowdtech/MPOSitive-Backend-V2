<?php

namespace App\Platform\Repositories;

use App\Salesman as Model;
use App\Platform\Domains\Salesman as Domain;

class SalesmanRepo
{
	public function first()
	{
		return Model::first();
	}
}