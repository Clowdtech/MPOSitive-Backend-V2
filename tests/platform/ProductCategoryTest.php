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

}