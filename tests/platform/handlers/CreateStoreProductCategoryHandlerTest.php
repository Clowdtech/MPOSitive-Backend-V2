<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateStoreProductCategoryHandlerTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $handler;

    public function SetUp()
    {
        parent::SetUp();

        $this->handler = new \App\Platform\Handlers\CreateStoreProductCategoryHandler;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Handlers\CreateStoreProductCategoryHandler::class, $this->handler);
    }

    /** @test */
    public function it_can_handle_the_creation_of_store_product_categories()
    {
        $storeRepo = new \App\Platform\Repositories\StoreRepo;
        $data = [
            'user_id'   =>  auth()->user()->id,
            'name'  =>  'test name',
            'background_color'  =>  '#cccccc',
            'font_color'  =>  '#cccccc',
            'active'  =>  true,
            'stores'  =>  [$storeRepo->first()->id],
        ];

        $this->handler->handle($data);
    }

}