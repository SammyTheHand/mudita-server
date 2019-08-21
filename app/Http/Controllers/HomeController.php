<?php

namespace App\Http\Controllers;

use App\Trigger;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $triggers = Trigger::orderBy('created_at', 'desc')->take(5)->get();

    	$events = auth()->user()->recentAccessableEvents();
        
        return view('home', compact('events'), compact('triggers'));
    }
}
