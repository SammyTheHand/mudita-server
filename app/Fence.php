<?php

namespace App;

use App\Event;
use Illuminate\Database\Eloquent\Model;

class Fence extends Model
{
    protected $guarded = [];

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }
}
