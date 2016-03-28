<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Platform\Repositories\StoreProductRepo;
use App\Platform\Repositories\StoreRepo;

class ProductController extends Controller
{
	protected $storeProductRepo;

	protected $storeRepo;

	public function __construct(StoreProductRepo $storeProductRepo, StoreRepo $storeRepo)
	{
		$this->storeProductRepo = $storeProductRepo;
		$this->storeRepo = $storeRepo;
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
		try {
			return $this->storeRepo->findBySlug(auth()->user()->id, $slug);
		} catch (\Exception $e) {
			// handle
		}
	}

    public function getProducts($slug)
    {
    	$store = $this->findStore($slug);
    	
    	$products = $this->storeProductRepo->getProducts($store->id);

    	return $products;
    }

    public function getSingleProduct($slug, $productId)
    {
    	return;
    }
}
