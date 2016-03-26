<?php

namespace App\Platform\Repositories;

use App\StoreStaff as Model;
use App\Platform\Domains\StoreStaff as Domain;

class StoreStaffRepo
{
	public function create(Domain $staff)
	{
		return Model::create([
			'store_id'	=> $staff->store->id,
			'staff_id'	=> $staff->staff->id,
		]);
	}
}