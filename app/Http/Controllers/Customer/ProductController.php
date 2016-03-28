<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Platform\Repositories\StoreProductRepo;
use App\Platform\Repositories\ProductRepo;
use App\Platform\Repositories\StoreRepo;

class ProductController extends Controller
{
	protected $storeProductRepo;

	protected $storeRepo;

	protected $productRepo;

	public function __construct(StoreProductRepo $storeProductRepo, StoreRepo $storeRepo, ProductRepo $productRepo)
	{
		$this->storeProductRepo = $storeProductRepo;
		$this->storeRepo = $storeRepo;
		$this->productRepo = $productRepo;
	}

	/**
	 * Helper method to find the store by slug
	 * in a little less verbose manner.
	 * 
	 * @param  [type] $slug [description]
	 * @return [type]       [description]
	 */
	protected function findStore($slug)
	{
		$store = [];

		try {
			$store = $this->storeRepo->findBySlug(auth()->user()->id, $slug);
		} catch (\Exception $e) {
			$this->handleException($e);
		}

		return $store;
	}

    public function getProducts($slug)
    {
    	$store = $this->findStore($slug);
    	$products = $this->storeProductRepo->getProducts($store->id);

    	return $this->gatherResponseData($products);
    }

    public function getSingleProduct($slug, $productId)
    {
    	$product = [];

    	try {
    		$store = $this->findStore($slug);
    		$product = $this->productRepo->find($productId);
		} catch (\Exception $e) {
			$this->handleException($e);
		}

		$this->gatherResponseData($product);
    }
}
