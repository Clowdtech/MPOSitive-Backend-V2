<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitorRouteTest extends TestCase
{
    use DatabaseTransactions;


    public function SetUp()
    {
        parent::SetUp();
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

    /** @test */
    public function it_fails_the_request_if_email_not_in_db()
    {
        $response = $this->call('POST',
            route('VisitorClientSignInRoute'),
            [
                'email' => 'imants2.kusins@gmail.com',
                'password' => 'password',
            ]
        );

        $this->assertEquals(302, $response->status());

        $response = $this->call('POST',
            route('VisitorClientSignInRoute'),
            [
                // 'email' => 'imants2.kusins@gmail.com',
                'password' => 'password',
            ]
        );

        $this->assertEquals(302, $response->status());
    }

    /** @test */
    public function it_can_post_to_sign_in_route()
    {
        $response = $this->call('POST',
            route('VisitorClientSignInRoute'),
            [
                'email' => 'imants.kusins@gmail.com',
                'password' => 'password',
            ]
        );

        $this->assertEquals(200, $response->status());
    }

}