<?php

namespace Tests\Feature;

use App\Event;
use App\Fence;
use Facades\Tests\Setup\EventFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ManageFencesTest extends TestCase
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

        $attributes = [
            $tag = 'Test tag',
            $latidue = $this->faker->latitude,
            $longitude = $this->faker->longitude,
        ];
        
        $this->post($event->path() . '/fences', $attributes)
            ->assertStatus(403);

        $this->assertDatabaseMissing('fences', $attributes);
    }

    /** @test */
    public function only_the_user_of_a_project_may_update_fences()
    {
        $this->signIn();

        $event = EventFactory::withFences(1)->create();

        $attributes = [
            $tag = 'Changed',
            $latidue = $this->faker->latitude,
            $longitude = $this->faker->longitude,
        ];

        $this->patch($event->fences[0]->path(), $attributes)
            ->assertStatus(403);

        $this->assertDatabaseMissing('fences', $attributes);
    }

    /** @test */
    public function an_event_can_have_fences()
    {
        $event = EventFactory::create();

        $attributes = [
            'tag' => 'test fence',
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];

        $this->actingAS($event->user)
            ->post($event->path() . '/fences', $attributes);

        $this->get($event->path())
            ->assertSee($attributes['tag'])
            ->assertSee($attributes['latitude'])
            ->assertSee($attributes['longitude']);
    }

    /** @test */
    public function a_fence_can_be_updated()
    {
        $event = EventFactory::withFences(1)->create();

        $this->actingAs($event->user)
            ->patch($event->fences->first()->path(), $attributes = [
            'tag' => 'Changed',
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            ]);

        $this->assertDatabaseHas('Fences', $attributes);
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

    /** @test */
    public function a_fence_requires_a_latitude()
    {
        $event = EventFactory::create();

        $attributes = factory('App\Fence')->raw(['latitude' => '']);

        $this->actingAs($event->user)
            ->post($event->path() . '/fences', $attributes)
            ->assertSessionHasErrors('latitude');
    }

    /** @test */
    public function a_fence_requires_a_longitude()
    {
        $event = EventFactory::create();

        $attributes = factory('App\Fence')->raw(['longitude' => '']);

        $this->actingAs($event->user)
            ->post($event->path() . '/fences', $attributes)
            ->assertSessionHasErrors('longitude');
    }
}
