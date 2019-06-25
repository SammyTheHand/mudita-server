<?php

namespace App\Http\Controllers;

use App\Event;
use App\Fence;
use Illuminate\Http\Request;

class EventFencesController extends Controller
{
    public function store(Event $event) 
    {
    	if (auth()->user()->isNot($event->user)) {
    		abort(403);
    	}

    	request()->validate(['tag' => 'required']);

    	$event->addFence(request('tag'));

    	return redirect($event->path());
    }

    public function update(Event $event, Fence $fence)
    {
    	if (auth()->user()->isNot($event->user)) {
    		abort(403);
    	}

    	request()->validate(['tag' => 'required']);

    	$fence->update([
    		'tag' => request('tag')
    	]);

    	return redirect($event->path());
    }
}
