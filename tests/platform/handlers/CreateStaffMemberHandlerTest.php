<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateStaffMemberHandlerTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    protected $handler;

    public function SetUp()
    {
        parent::SetUp();

        $this->handler = new \App\Platform\Handlers\CreateStaffMember;

        $this->actingAs(\App\User::first());
    }

    /** @test */
    public function it_instantiates_dependencies()
    {
    	$this->assertInstanceOf(\App\Platform\Handlers\CreateStaffMember::class, $this->handler);
    }

    /** @test */
    public function it_can_handle_staff_member_creation()
    {
        $storerepo = new \App\Platform\Repositories\StoreRepo;
        $data = [
            'name'  =>  'some test name',
            'pin'  =>  null,
            'user_id'  =>  auth()->user()->id,
            'store_id'  =>  $storerepo->first()->id,
        ];

        $this->assertInstanceOf(\App\Staff::class, $this->handler->handle($data));

        // creates with correct pin
        $data = [
            'name'  =>  'some test name',
            'pin'  =>  '1111',
            'user_id'  =>  auth()->user()->id,
            'store_id'  =>  $storerepo->first()->id,
        ];

        $this->assertEquals($data['pin'], $this->handler->handle($data)->pin);
    }

}