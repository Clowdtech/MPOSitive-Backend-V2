<?php

namespace App\Platform\Handlers;

use App\Platform\Repositories\StoreCategoryRepo;
use App\Platform\Repositories\ProductCategoryRepo;
use App\Platform\Repositories\UserRepo;

class CreateStoreProductCategoryHandler
{
	protected $storeCategoryRepo;

	protected $userRepo;

	public function __construct()
	{
		$this->storeCategoryRepo = new StoreCategoryRepo;
		$this->userRepo = new UserRepo;
	}

	public function handle(array $data)
	{
		dd($data);
		// 1. Create the product category.
		// 2. Create the store product category.
	}
}