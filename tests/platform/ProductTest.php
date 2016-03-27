<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\Product;
        $this->repo = new \App\Platform\Repositories\ProductRepo;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Domains\Product::class, $this->domain);
    	$this->assertInstanceOf(\App\Platform\Repositories\ProductRepo::class, $this->repo);
    }

    /** @test */
    public function it_can_create_a_new_product()
    {
        $userRepo = new \App\Platform\Repositories\UserRepo;
        $product = $this->domain->setName('Linguini')
                                ->setBackgroundColor('#cccccc')
                                ->setFontColor('#ffffff')
                                ->setUser(auth()->user())
                                ->setPrice(4.5);

        $this->assertInstanceOf(\App\Product::class, $this->repo->create($product));
    }

}