<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UidByStoreNameGeneratorTest extends TestCase
{
    protected $generator;

    public function SetUp()
    {
        parent::SetUp();

        $this->generator = new \App\Platform\Helpers\Generate;
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
        $this->assertInstanceOf(\App\Platform\Helpers\Generate::class, $this->generator);
    }

    /** @test */
    public function it_can_generate_a_store_slug_from_a_store_test_name()
    {
        $slug = $this->generator->storeSlugFromName('my store test name');
        $this->assertEquals(true, is_string($slug));

        $this->assertEquals('my-store-test-name', $slug);
    }


}