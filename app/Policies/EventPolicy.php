<?php

namespace App\Policies;

use App\Event;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Event $event)
    {
    	return $user->is($event->user);
    }

    public function update(User $user, Event $event)
    {
        return $user->is($event->user) || $event->members->contains($user);
    }
}
