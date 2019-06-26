<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventFencesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_add_fences_to_events()
    {
        $event = factory('App\Event')->create();

        $this->post($event->path() . '/fences')->assertRedirect('login');
    }

    /** @test */
    public function only_the_user_of_a_project_may_add_fences()
    {
        $this->signIn();

        $event = factory('App\Event')->create();

        $this->post($event->path() . '/fences', ['tag' => 'Test tag'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('fences', ['tag' => "Test tag"]);
    }

        /** @test */
    public function only_the_user_of_a_project_may_update_fences()
    {
        $this->signIn();

        $event = factory('App\Event')->create();
        $fence = $event->addFence('Test Fence');

        $this->patch($fence->path(), ['tag' => 'Changed'])
            ->assertStatus(403);


        $this->assertDatabaseMissing('fences', ['tag' => "Changed"]);
    }

    /** @test */
    public function an_event_can_have_fences()
    {
        $this->signIn();

        $event = auth()->user()->events()->create(
            factory(Event::class)->raw()
        );

        $this->post($event->path() . '/fences', ['tag' => 'Test Fence']);

        $this->get($event->path())
            ->assertSee('Test Fence');
    }

    /** @test */
    public function a_fence_can_be_updated()
    {
        $this->signIn();

        $event = auth()->user()->events()->create(
            factory(Event::class)->raw()
        );

        $fence = $event->addFence('Test Fence');

        $this->patch($event->path() . '/fences/' . $fence->id, [
            'tag' => 'changed'
        ]);

        $this->assertDatabaseHas('Fences', [
            'tag' => 'changed'
        ]);
    }

    /** @test */
    public function a_fence_requires_a_tag()
    {
        $this->signIn();

        $event = auth()->user()->events()->create(
            factory(Event::class)->raw()
        );

        $attributes = factory('App\Fence')->raw(['tag' => '']);

        $this->post($event->path() . '/fences', $attributes)->assertSessionHasErrors('tag');
    }
}
