<?php

namespace App;

use App\Event;
use Illuminate\Database\Eloquent\Model;

class Fence extends Model
{
    protected $guarded = [];

    protected $touches = ['Event'];

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }

    public function path()
    {
    	return "/events/{$this->event->id}/fences/{$this->id}";
    }
}
