<?php

namespace Tests\Feature;

use App\Event;
use App\Fence;
use Facades\Tests\Setup\EventFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class EventFencesTest extends TestCase
{
    use withFaker, RefreshDatabase;

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

        $event = EventFactory::withFences(1)->create();

        $this->patch($event->fences[0]->path(), ['tag' => 'Changed'])
            ->assertStatus(403);


        $this->assertDatabaseMissing('fences', ['tag' => "Changed"]);
    }

    /** @test */
    public function an_event_can_have_fences()
    {
        $event = EventFactory::create();

        $this->actingAS($event->user)
            ->post($event->path() . '/fences', ['tag' => 'Test Fence']);

        $this->get($event->path())
            ->assertSee('Test Fence');
    }

    /** @test */
    public function a_fence_can_be_updated()
    {
        $event = EventFactory::withFences(1)->create();

        $this->actingAs($event->user)
            ->patch($event->fences->first()->path(), [
            'tag' => 'changed'
        ]);

        $this->assertDatabaseHas('Fences', [
            'tag' => 'changed'
        ]);
    }

    /** @test */
    public function a_fence_requires_a_tag()
    {
        $event = EventFactory::create();

        $attributes = factory('App\Fence')->raw(['tag' => '']);

        $this->actingAs($event->user)
            ->post($event->path() . '/fences', $attributes)
            ->assertSessionHasErrors('tag');
    }
}
