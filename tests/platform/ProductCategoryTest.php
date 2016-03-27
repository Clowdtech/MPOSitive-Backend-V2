<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductCategoryTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\ProductCategory;
        $this->repo = new \App\Platform\Repositories\ProductCategoryRepo;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Domains\ProductCategory::class, $this->domain);
    	$this->assertInstanceOf(\App\Platform\Repositories\ProductCategoryRepo::class, $this->repo);
    }

    /** @test */
    public function logged_in_user_can_create_a_product_category_to_a_specific_store()
    {
        $category = $this->domain->setName('Latte')
                                 ->setBackgroundColor('#cccccc')
                                 ->setFontColor('#ffffff')
                                 ->setActive(true)
                                 ->setUser(auth()->user());

        $this->assertInstanceOf(\App\ProductCategory::class, $this->repo->create($category));
    }

}