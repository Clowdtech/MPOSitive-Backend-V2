<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorRouteTest extends TestCase
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
    public function it_can_show_index_page()
    {
        $response = $this->call('GET', route('VisitorHomePage'));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_client_login_page()
    {
        $response = $this->call('GET', route('VisitorClientSignInPage'));

        $this->assertEquals(200, $response->status());
    }

}