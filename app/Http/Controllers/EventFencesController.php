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
            'text' => 'required',
            'textColour' => 'required',
            'bgColour' => 'required',
        ]);

        $event->addFence(
            request('tag'),
            request('latitude'),
            request('longitude'),
            request('text'),
            request('textColour'),
            request('bgColour'),
        );

        return redirect($event->path());
    }

    public function edit(Event $event, Fence $fence)
    {
        return view('fences.edit', compact('event', 'fence'));
    }

    public function update(Event $event, Fence $fence)
    {
        $this->authorize('update', $fence->event);

        request()->validate([
            'tag' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'text' => 'required',
            'textColour' => 'required',
            'bgColour' => 'required',
        ]);

        $fence->update([
            'tag' => request('tag'),
            'latitude' => request('latitude'),
            'longitude' => request('longitude'),
            'text' => request('text'),
            'textColour' => request('textColour'),
            'bgColour' => request('bgColour'),
        ]);

        return redirect($event->path());
    }

    public function create(Event $event)
    {
        return view('fences.create', compact('event'));
    }

    public function destroy(Event $event, Fence $fence)
    {
        $this->authorize('manage', $event);

        $fence->delete();

        return redirect($event->path());
    }
}
