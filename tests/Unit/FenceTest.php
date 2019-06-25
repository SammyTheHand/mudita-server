<?php

namespace Tests\Unit;

use App\Fence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FenceTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function a_fence_belongs_to_an_event()
	{
	    $fence = factory(Fence::class)->create();

	    $this->assertInstanceOf(Event::class, $fence->event);
	}

	/** @test */
	public function it_has_a_path()
	{
	    $fence = factory(Fence::class)->create();  

	    $this->assertEquals('/events/' . $fence->event->id . '/fences/' . $fence->id, $fence->path());
	}
}
