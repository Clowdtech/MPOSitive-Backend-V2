<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerRouteTest extends TestCase
{
    use DatabaseTransactions;

    public function SetUp()
    {
        parent::SetUp();

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_can_show_authenticated_client_home_page()
    {
        $response = $this->call('GET', route('CustomerHomePage'));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_customers_profile_page()
    {
        $response = $this->call('GET', route('CustomerAccountPage'));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_stores_page()
    {
        $response = $this->call('GET', route('CustomerStorePage'));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_single_store_page()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $response = $this->call('GET', route('CustomerSingleStorePage', ['slug' => $storerepo->first()->slug]));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_store_devices_page()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $response = $this->call('GET', route('CustomerStoreDevicesPage', ['slug' => $storerepo->first()->slug]));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_store_products_page()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $response = $this->call('GET', route('CustomerStoreProductsPage', ['slug' => $storerepo->first()->slug]));

        $this->assertEquals(200, $response->status());
    }


    /** @test */
    public function it_can_show_store_single_product_page()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $productrepo = new \App\Platform\Repositories\ProductRepo;
        $response = $this->call('GET', route('CustomerStoreSingleProductPage', [
            'slug' => $storerepo->first()->slug,
            'productid' => $productrepo->first()->uid,
            ]));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_account_log_page()
    {
        $response = $this->call('GET', route('CustomerAccountLogPage'));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_account_settings_page()
    {
        $response = $this->call('GET', route('CustomerAccountSettingsPage'));

        $this->assertEquals(200, $response->status());
    }

}