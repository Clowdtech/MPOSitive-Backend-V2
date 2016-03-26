<?php

namespace App\Platform\Repositories;

use App\StoreDevice as Model;
use App\Platform\Domains\StoreDevice as Domain;

class StoreDeviceRepo
{
	public function create(Domain $device)
	{
		return Model::create([
			'brand'	=>	$device->brand,
			'model'	=>	 $device->model,
			'uid'	=>	$device->uid,
			'store_id'	=>	$device->store->id,
			'created_by' => $device->user->id,
		]);
	}
}