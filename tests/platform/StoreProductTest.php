<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreProductTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\StoreProduct;
        $this->repo = new \App\Platform\Repositories\StoreProductRepo;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Domains\StoreProduct::class, $this->domain);
    	$this->assertInstanceOf(\App\Platform\Repositories\StoreProductRepo::class, $this->repo);
    }

    /** @test */
    public function it_can_create_store_product()
    {
        $storeRepo = new \App\Platform\Repositories\StoreRepo;
        $productRepo = new \App\Platform\Repositories\ProductRepo;

        $product = $this->domain->setQty(10)
                                ->setStore($storeRepo->first())
                                ->setProduct($productRepo->first())
                                ->setActive(true);


        $this->assertInstanceOf(\App\StoreProduct::class, $this->repo->create($product));
    }

}