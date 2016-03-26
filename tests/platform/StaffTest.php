<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StaffTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    protected $generator;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\Staff;
        $this->repo = new \App\Platform\Repositories\StaffRepo;
        $this->generator = new \App\Platform\Helpers\Generate;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Domains\Staff::class, $this->domain);
    	$this->assertInstanceOf(\App\Platform\Repositories\StaffRepo::class, $this->repo);
    }

    /** @test */
    public function it_can_set_a_pin_if_provided()
    {
        $pin = '1111';
        $set = $this->domain->setPin($pin);
        $this->assertEquals($pin, $set->pin);
    }

    /** @test */
    public function it_generates_a_pin_if_not_provided()
    {
        $set = $this->domain->setPin();
        $this->assertEquals(4, strlen($set->pin));
    }

    /** @test */
    public function it_can_create_a_staff_member()
    {
        $storeRepo = new \App\Platform\Repositories\StoreRepo;
        $staff = $this->domain->setName('John Doe')
                              ->setPin()
                              ->setUser(auth()->user())
                              ->setStore($storeRepo->first());

        $this->assertInstanceOf(\App\Staff::class, $this->repo->create($staff));
    }

}