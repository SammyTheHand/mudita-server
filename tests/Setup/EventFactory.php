<?php
namespace Tests\Setup;
use App\Event;
use App\Fence;
use App\User;

class EventFactory
{

    protected $fencesCount = 0;

    protected $user;

    public function withFences($count)
    {
        $this->fencesCount = $count;
        return $this;
    }

    public function ownedBy($user)
    {
        $this->user = $user;
        return $this;
    }

    public function create()
    {
        $event = factory(Event::class)->create([
            'user_id' => $this->user ?? factory(User::class)
        ]);
        factory(Fence::class, $this->fencesCount)->create([
            'event_id' => $event
        ]);
        return $event;
    }
}