<?php

namespace App\Platform\Handlers;

use App\Platform\Repositories\StoreCategoryRepo;
use App\Platform\Repositories\ProductCategoryRepo;
use App\Platform\Repositories\UserRepo;

use App\Platform\Domains\ProductCategory;

class CreateStoreProductCategoryHandler
{
	protected $storeCategoryRepo;
	protected $productCategoryRepo;
	protected $productCategoryDomain;

	protected $userRepo;

	protected $data = [];

	protected $category;

	public function __construct()
	{
		$this->storeCategoryRepo = new StoreCategoryRepo;
		$this->productCategoryRepo = new ProductCategoryRepo;
		$this->productCategoryDomain = new ProductCategory;
		$this->userRepo = new UserRepo;
	}

	public function handle(array $data)
	{
		$this->data = $data;
		// 1. Create the product category.
		$this->createProductCategory();
		// 2. Create the store product category.

	}

	protected function createProductCategory()
	{
		$category = $this->productCategoryDomain->setName('Latte')
                                 ->setBackgroundColor('#cccccc')
                                 ->setFontColor('#ffffff')
                                 ->setActive(true)
                                 ->setUser($this->userRepo->find($this->data['user_id']));

        $this->category = $category;
	}
}