<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
    	$events = auth()->user()->events;

		return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $this->authorize('update', $event);
        
    	return view('events.show', compact('event'));
    }

    public function store()
    {
    	$event = auth()->user()->events()->create($this->validateRequest());

    	return redirect($event->path());
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Event $event)
    {
        $this->authorize('update', $event);

        $event->update($this->validateRequest());

        return redirect($event->path());
    }
        
    public function create()
    {
        return view('events.create');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3' 
        ]);
    }


}
