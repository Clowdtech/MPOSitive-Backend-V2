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
    public function it_can_show_stores_page()
    {
        $response = $this->call('GET', route('CustomerStorePage'));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_single_store_page()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $response = $this->call('GET', route('CustomerSingleStorePage', ['uid', $storerepo->first()->uid]));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_store_devices_page()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $response = $this->call('GET', route('CustomerStoreDevicesPage', ['uid', $storerepo->first()->uid]));

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_show_store_products_page()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $response = $this->call('GET', route('CustomerStoreProductsPage', ['uid', $storerepo->first()->uid]));

        $this->assertEquals(200, $response->status());
    }


    /** @test */
    public function it_can_show_store_product_page()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $productrepo = new \App\Platform\Repositories\ProductRepo;
        $response = $this->call('GET', route('CustomerStoreSingleProductPage', [
            'uid' => $storerepo->first()->uid,
            'productid' => $productrepo->first()->uid,
            ]));

        $this->assertEquals(200, $response->status());
    }

}