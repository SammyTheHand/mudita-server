<?php

namespace App\Http\Controllers;

use App\Trigger;
use Illuminate\Http\Request;

class TriggersController extends Controller
{
    
    public function index()
    {
        $triggers = Trigger::orderBy('created_at', 'desc')->get();
        
        return view('triggers.index', compact('triggers'));
    }
}
