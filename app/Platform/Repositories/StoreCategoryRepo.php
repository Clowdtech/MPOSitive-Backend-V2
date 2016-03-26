<?php

namespace App\Platform\Repositories;

use App\StoreCategory as Model;
use App\Platform\Domains\StoreCategory as Domain;

class StoreCategoryRepo
{
	public function create(Domain $category)
	{
		return Model::create([
			'name'		=>	$category->name,
			'active'		=>	$category->active,
		]);
	}

	public function get($id)
	{
		return Model::where('id', $id)->first();
	}

	public function first()
	{
		return Model::first();
	}
}