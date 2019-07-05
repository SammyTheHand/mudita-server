<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $event = factory('App\Event')->create();

        $this->assertEquals('/events/' . $event->id, $event->path());
    }

    /** @test */
    public function it_belongs_to_a_user()
    {
        $event = factory('App\Event')->create();

        $this->assertInstanceOf('App\User', $event->user);
    }

    /** @test */
    public function it_can_add_a_fence()
    {
        $event = factory('App\Event')->create();

        $fence = $event->addFence('Test Fence');

        $this->assertTrue($event->fences->contains($fence));
    }

    /** @test */
    public function it_can_invite_a_user()
    {
        $event = factory('App\Event')->create();

        $event->invite($user = factory('App\User')->create());

        $this->assertTrue($event->members->contains($user));
    }
}
