<?php

namespace Tests\Feature;

use App\Event;
use Facades\Tests\Setup\EventFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageEventsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_manage_projects()
    {
        $event = factory('App\Event')->create();

        $this->get('/events')->assertRedirect('login');
        
        $this->get('/events/create')->assertRedirect('login');

        $this->get('/events/edit')->assertRedirect('login');

        $this->get($event->path())->assertRedirect('login');

        $this->post('/events', $event->toArray())->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_an_event()
    {
        $this->signIn();

        $this->get('/events/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->sentence(4),
            'notes' => 'General notes here.'
        ];

        $response = $this->post('/events', $attributes);

        $event = Event::where($attributes)->first();  

        $response->assertRedirect($event->path());

        $this->get($event->path())
            ->assertSee($attributes['title'])
            ->assertSee($attributes['description'])
            ->assertSee($attributes['notes']);
    }

    /** @test */
    public function a_user_can_update_an_event()
    {
        $event = EventFactory::create();

        $this->actingAs($event->user)
             ->patch($event->path(), $attributes = [
                'title' => 'Changed', 
                'description' => 'Changed', 
                'notes' => 'Changed'
            ])
             ->assertRedirect($event->path());

        $this->get($event->path().'/edit')->assertOK();

        $this->assertDatabaseHas('events', $attributes);
    }

    /** @test */
    public function a_user_can_view_their_event()
    {
        $event = EventFactory::create();

        $this->actingAs($event->user)
             ->get($event->path())
             ->assertSee($event->title)
             ->assertSee($event->description);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_events_of_others()
    {
        $this->signIn();

        $event = factory('App\Event')->create();

        $this->get($event->path())->assertStatus(403);
    }

        /** @test */
    public function an_authenticated_user_cannot_update_the_events_of_others()
    {
        $this->signIn();

        $event = factory('App\Event')->create();

        $this->patch($event->path())->assertStatus(403);
    }

    /** @test */
    public function an_event_requires_a_title()
    {
        $this->signIn();

        $attributes = factory('App\Event')->raw(['title' => '']);

        $this->post('/events', $attributes)->assertSessionHasErrors('title');
    }

        /** @test */
    public function an_event_requires_a_description()
    {
        $this->signIn();

        $attributes = factory('App\Event')->raw(['description' => '']);

        $this->post('/events', $attributes)->assertSessionHasErrors('description');
    }
}
