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

        request()->validate([
            'tag' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $event->addFence(
            request('tag'),
            request('latitude'),
            request('longitude'),
        );

        return redirect($event->path());
    }

    public function update(Event $event, Fence $fence)
    {
        $this->authorize('update', $fence->event);

        request()->validate([
            'tag' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $fence->update([
            'tag' => request('tag'),
            'latitude' => request('latitude'),
            'longitude' => request('longitude'),
        ]);

        return redirect($event->path());
    }

    public function create(Event $event)
    {
        return view('fences.create', compact('event'));
    }
}
