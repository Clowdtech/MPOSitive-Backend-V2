<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreDeviceTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\StoreDevice;
        $this->repo = new \App\Platform\Repositories\StoreDeviceRepo;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Domains\StoreDevice::class, $this->domain);
    	$this->assertInstanceOf(\App\Platform\Repositories\StoreDeviceRepo::class, $this->repo);
    }

    /** @test */
    public function logged_in_user_can_add_a_device_to_store()
    {
        $storeRepo = new \App\Platform\Repositories\StoreRepo;
        $device = $this->domain->setBrand('SAMSUNG')
                               ->setModel('ZXC4RTE')
                               ->setUser(auth()->user())
                               ->setStore($storeRepo->first());

        $this->assertInstanceOf(\App\StoreDevice::class, $this->repo->create($device));
    }

    /** @test */
    public function it_can_get_all_stores_devices()
    {
        $store = new \App\Platform\Repositories\StoreRepo;
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->repo->getByStore($store->first()->id));
    }
}