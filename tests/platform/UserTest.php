<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $domain;

    protected $repo;

    public function SetUp()
    {
        parent::SetUp();

        $this->domain = new \App\Platform\Domains\User;
        $this->repo = new \App\Platform\Repositories\UserRepo;
    }

    /** @test */
    public function it_generates_unique_id_for_the_user()
    {
        $this->assertEquals(true, is_string($this->domain->getUid()));
    }

    /** @test */
    public function it_can_create_a_new_user()
    {
        $salesmanRepo = new \App\Platform\Repositories\SalesmanRepo;
        $pwd = 'password';
        $user = $this->domain->setName('test name')
                             ->setPassword($pwd)
                             ->setEmail('imants.kusins2@gmail.com')
                             ->setSalesman($salesmanRepo->first());

        $this->assertEquals(true, is_string($this->domain->getPassword()));

        $created = $this->repo->create($user);
        $this->assertInstanceOf(\App\User::class, $created);
    }

    /** @test */
    public function it_can_return_logged_in_users_account_details()
    {
        $this->assertEquals(auth()->user(), $this->repo->getLoggedIn());
    }

}
