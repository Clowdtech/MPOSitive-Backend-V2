<?php

namespace App\Platform\Handlers;

use App\Platform\Repositories\StoreCategoryRepo;
use App\Platform\Repositories\ProductCategoryRepo;
use App\Platform\Repositories\StoreProductCategoryRepo;
use App\Platform\Repositories\UserRepo;
use App\Platform\Repositories\StoreRepo;

use App\Platform\Domains\ProductCategory;
use App\Platform\Domains\StoreProductCategory;

class CreateStoreProductCategoryHandler
{
	protected $storeCategoryRepo;
	protected $productCategoryRepo;
	protected $productCategoryDomain;
	protected $storeProductCategoryDomain;

	protected $userRepo;
	protected $storeRepo;
	protected $storeProductCategoryRepo;

	protected $data = [];

	protected $productCategory;

	public function __construct()
	{
		$this->storeCategoryRepo = new StoreCategoryRepo;
		$this->productCategoryRepo = new ProductCategoryRepo;
		$this->productCategoryDomain = new ProductCategory;
		$this->storeProductCategoryDomain = new StoreProductCategory;
		$this->storeProductCategoryRepo = new StoreProductCategoryRepo;
		$this->userRepo = new UserRepo;
		$this->storeRepo = new StoreRepo;
	}

	public function handle(array $data)
	{
		$this->data = $data;
		// 1. Create the product category.
		$this->createProductCategory();
		// 2. Create the store product category.
		return $this->createStoreProductCategory();
	}

	protected function createStoreProductCategory()
	{
		foreach ($this->data['stores'] as $store) {
			$category = $this->storeProductCategoryDomain->setActive(true)
            				 ->setStore($this->storeRepo->find($store))
            				 ->setStoreProductCategory($this->productCategory);

            return $this->storeProductCategoryRepo->create($category);
		}
	}

	protected function createProductCategory()
	{
		$category = $this->productCategoryDomain->setName($this->data['name'])
                                 ->setBackgroundColor($this->data['background_color'])
                                 ->setFontColor($this->data['font_color'])
                                 ->setActive(true)
                                 ->setUser($this->userRepo->find($this->data['user_id']));

        $this->productCategory = $this->productCategoryRepo->create($category);
	}
}