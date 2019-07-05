<?php

namespace App\Http\Controllers;

use App\Event;
use App\Fence;
use Illuminate\Http\Request;

class EventFencesController extends Controller
{
    public function store(Event $event)
    {
        $this->authorize('update', $event);

        request()->validate(['tag' => 'required']);

        $event->addFence(request('tag'));

        return redirect($event->path());
    }

    public function update(Event $event, Fence $fence)
    {
        $this->authorize('update', $fence->event);

        request()->validate(['tag' => 'required']);

        $fence->update([
            'tag' => request('tag')
        ]);

        return redirect($event->path());
    }
}
