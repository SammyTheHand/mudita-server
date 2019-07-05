<?php

namespace Tests\Unit;

use Facades\Tests\Setup\EventFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_has_events()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->events);
    }

    /** @test */
    public function a_user_has_accessableEvents()
    {
        $joe = factory('App\User')->create();

        EventFactory::ownedby($joe)->create();

        $this->assertCount(1, $joe->accessableEvents());

        $naomi = factory('App\User')->create();
        $ruth = factory('App\User')->create();

        $event = tap(EventFactory::ownedby($naomi)->create())->invite($ruth);

        $this->assertCount(1, $joe->accessableEvents());

        $event->invite($joe);
        $this->assertCount(2, $joe->accessableEvents());
    }
}
