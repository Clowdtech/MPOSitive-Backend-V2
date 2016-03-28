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

        $this->actingAs(\App\User::first());
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
    	$categoryRepo = new \App\Platform\Repositories\StoreCategoryRepo;

    	$store = $this->domain->setUser(auth()->user())
                              ->setName('my second store')
    						  ->setAddress('90 Gaysham avenue, Ilford, IG2 6TA, Unite Kingdom')
    						  ->setLatitude(51.5798718)
    						  ->setLongitude(0.07193119999999453)
    						  ->setCategory($categoryRepo->first());

    	$this->assertInstanceOf(\App\Store::class, $this->repo->create($store));
    }

    /** @test */
    public function it_can_return_all_users_stores()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->repo->getUsersStores(auth()->user()->id));
    }

    /** @test */
    public function it_can_find_a_store_by_slug()
    {
        $this->assertInstanceOf(
            \App\Store::class,
            $this->repo->findBySlug($this->repo->first()->id, $this->repo->first()->slug)
        );
    }

}