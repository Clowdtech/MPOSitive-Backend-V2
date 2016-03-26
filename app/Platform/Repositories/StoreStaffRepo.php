<?php

namespace App\Platform\Repositories;

use App\StoreStaff as Model;
use App\Platform\Domains\StoreStaff as Domain;

class StoreStaffRepo
{
	/**
	 * Create a new store staff record.
	 * 
	 * @param  App\Platform\Domains\StoreStaff $staff
	 * @return mixed
	 */
	public function create(Domain $staff)
	{
		return Model::create([
			'store_id'	=> $staff->store->id,
			'staff_id'	=> $staff->staff->id,
		]);
	}
}