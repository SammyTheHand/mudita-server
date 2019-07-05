<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventInvitationRequest;
use App\Event;
use App\User;


class EventInvitationsController extends Controller
{
	 /**
     * Invite a new user to the event.
     *
     * @param  event                  $event
     * @param  EventInvitationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Event $event, EventInvitationRequest $request)
    {
        $user = User::whereEmail(request('email'))->first();

        $event->invite($user);

        return redirect($event->path());
    }

}
