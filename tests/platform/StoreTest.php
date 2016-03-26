<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\Store;
        $this->repo = new \App\Platform\Repositories\StoreRepo;
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Domains\Store::class, $this->domain);
    	$this->assertInstanceOf(\App\Platform\Repositories\StoreRepo::class, $this->repo);
    }

    /** @test */
    public function logged_in_user_can_create_a_store()
    {
    	
    }

}