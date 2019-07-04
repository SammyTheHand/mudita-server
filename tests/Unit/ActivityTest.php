<?php

namespace Tests\Unit;

use Facades\Tests\Setup\EventFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function it_has_a_user()
	{
		$user = $this->signIn();

	    $event = EventFactory::ownedBy($user)->create();

	    $this->assertEquals($user->id, $event->activity->first()->user->id);
	}
}
