<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreStaffTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    protected $generator;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\StoreStaff;
        $this->repo = new \App\Platform\Repositories\StoreStaffRepo;
        $this->generator = new \App\Platform\Helpers\Generate;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
        $this->assertInstanceOf(\App\Platform\Domains\StoreStaff::class, $this->domain);
        $this->assertInstanceOf(\App\Platform\Repositories\StoreStaffRepo::class, $this->repo);
    }

    /** @test */
    public function it_can_create_a_store_staff()
    {
        $storeRepo = new \App\Platform\Repositories\StoreRepo;
        $staffRepo = new \App\Platform\Repositories\StaffRepo;
        $staff = $this->domain->setStore($storeRepo->first())
                              ->setStaff($staffRepo->first());

        $this->assertInstanceOf(\App\StoreStaff::class, $this->repo->create($staff));
    }
}