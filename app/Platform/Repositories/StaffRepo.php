<?php

namespace App\Platform\Repositories;

use App\Staff as Model;
use App\Platform\Domains\Staff as Domain;

class StaffRepo
{
	/**
	 * Return first record from the staff table.
	 * 
	 * @return mixed
	 */
	public function first()
	{
		return Model::first();
	}

	/**
	 * Create a new staff member.
	 * 
	 * @param  App\Platform\Domains\Staff $member
	 * @return mixed
	 */
	public function create(Domain $member)
	{
		return Model::create([
			'name'	=>	$member->name,
			'pin'	=>	$member->pin,
			'user_id'	=>	$member->user->id,
		]);
	}
}