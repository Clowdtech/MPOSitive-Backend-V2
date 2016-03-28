<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreProductCategoryTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\StoreProductCategory;
        $this->repo = new \App\Platform\Repositories\StoreProductCategoryRepo;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Domains\StoreProductCategory::class, $this->domain);
    	$this->assertInstanceOf(\App\Platform\Repositories\StoreProductCategoryRepo::class, $this->repo);
    }

    /** @test */
    public function it_can_create_a_new_store_product_category()
    {
        $storeRepo = new \App\Platform\Repositories\StoreRepo;
        $productCategory = new \App\Platform\Repositories\ProductCategoryRepo;
        $category = $this->domain->setActive(true)
                                 ->setStore($storeRepo->first())
                                 ->setStoreProductCategory($productCategory->first());
        $this->assertInstanceOf(\App\StoreProductCategory::class, $this->repo->create($category));
    }

    /** @test */
    public function it_can_return_store_product_categories()
    {
        $storeRepo = new \App\Platform\Repositories\StoreRepo;
        $this->assertEquals(true, is_array($this->repo->getByStore($storeRepo->first()->id)));
    }

}