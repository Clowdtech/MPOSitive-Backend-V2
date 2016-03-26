<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreCategoryTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\StoreCategory;
        $this->repo = new \App\Platform\Repositories\StoreCategoryRepo;
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Domains\StoreCategory::class, $this->domain);
    	$this->assertInstanceOf(\App\Platform\Repositories\StoreCategoryRepo::class, $this->repo);
    }

    /** @test */
    public function it_can_create_a_new_store_category()
    {
        $category = $this->domain->setName('some store name')
                                 ->setActive(true);

        $this->assertInstanceOf(\App\StoreCategory::class, $this->repo->create($category));
    }

    /** @test */
    public function it_can_return_store_category()
    {
         $category = $this->domain->setName('some store name')
                                 ->setActive(true);
        $created = $this->repo->create($category);

        $this->assertInstanceOf(\App\StoreCategory::class, $this->repo->get($created->id));
    }

}