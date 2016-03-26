<?php

namespace App\Platform\Repositories;

use App\Staff as Model;
use App\Platform\Domains\Staff as Domain;

class StaffRepo
{
	public function create(Domain $member)
	{
		return Model::create([
			'name'	=>	$member->name,
			'pin'	=>	$member->pin,
			'user_id'	=>	$member->user->id,
		]);
	}
}