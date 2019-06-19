<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
    	$events = Event::all();

		return view('events.index', compact('events'));
    }

    public function store()
    {
    	$attributes = request()->validate([
    		'title' => 'required',
    		'description' => 'required'
    	]);

    	Event::create($attributes);

    	return redirect('/events');
    }

}
