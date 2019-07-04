<?php

namespace Tests\Feature;

use App\Fence;
use Facades\Tests\Setup\EventFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TriggerActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function creating_an_event()
    {
        $event = EventFactory::create();
        $this->assertCount(1, $event->activity);
        tap($event->activity->last(), function ($activity) {
            $this->assertEquals('created_event', $activity->description);
            $this->assertNull($activity->changes);
        });
    }

    /** @test */
    function updating_an_event()
    {
        $event = EventFactory::create();
        $originalTitle = $event->title;
        $event->update(['title' => 'Changed']);
        $this->assertCount(2, $event->activity);
        tap($event->activity->last(), function ($activity) use ($originalTitle) {
            $this->assertEquals('updated_event', $activity->description);
            $expected = [
                'before' => ['title' => $originalTitle],
                'after' => ['title' => 'Changed']
            ];
            $this->assertEquals($expected, $activity->changes);
        });
    }

        /** @test */
    function creating_a_fence()
    {
        $event = EventFactory::create();
        $event->addFence('Some fence');
        $this->assertCount(2, $event->activity);
        tap($event->activity->last(), function ($activity) {
            $this->assertEquals('created_fence', $activity->description);
            $this->assertInstanceOf(Fence::class, $activity->subject);
            $this->assertEquals('Some fence', $activity->subject->tag);
        });
    }
}
