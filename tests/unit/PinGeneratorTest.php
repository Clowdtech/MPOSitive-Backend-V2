<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PinGeneratorTest extends TestCase
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
    public function it_generates_a_four_digit_code()
    {
        $this->assertEquals(4, strlen($this->generator->pin()));
    }

}