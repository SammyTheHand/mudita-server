<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
}
