<?php

namespace Tests\Feature;

use App\User;
use Facades\Tests\Setup\EventFactory;
use Faker\Provider\email;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvitationsTest extends TestCase
{
    use WithFaker, RefreshDatabase ;

    /** @test */
    public function only_the_user_who_created_the_event_can_invite_other_users()
    {
        $event = EventFactory::create();
        $user = factory(User::class)->create();

        $assertInvitationForbidden = function () use ($user, $event){
            $this->actingAs($user)
                 ->post($event->path() . '/invitations')
                 ->assertStatus(403);
        };

        $assertInvitationForbidden();

        $event->invite($user);

        $assertInvitationForbidden();
    }

    /** @test */
    public function an_event_can_invite_a_user()
    {
        $this->withoutExceptionHandling();

        $event = EventFactory::create();
        
        $user = factory(User::class)->create();

        $this->actingAs($event->user)->post($event->path() . '/invitations', [
            'email' => $user->email
        ]);

        $this->assertTrue($event->members->contains($user));
    }

    /** @test */
    public function the_email_address_must_be_associated_with_a_valid_mudita_account()
    {
        $event = EventFactory::create();
        $this->actingAs($event->user)
            ->post($event->path() . '/invitations', [
                'email' => 'notauser@example.com'
            ])
            ->assertSessionHasErrors([
                'email' => 'The user you are inviting must have a Mudita account.'
            ], null, 'invitations');
    }
    
    /** @test */
    public function invited_users_can_update_an_events_details()
    {
        $event = EventFactory::create();

        $event->invite($newUser = factory(User::class)->create());

        $this->signIn($newUser);
        $this->post(action('EventFencesController@store', $event), $fence = [
            'tag' => 'New Task',
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ]);

        $this->assertDatabaseHas('fences', $fence);
    }
}
