<?php

namespace App;

use App\Event;
use Illuminate\Database\Eloquent\Model;

class Fence extends Model
{
    use RecordsActivity;
    
    protected $guarded = [];

    public $old = [];

    protected $touches = ['Event'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function path()
    {
        return "/events/{$this->event->id}/fences/{$this->id}";
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * Model events that should trigger new activity.
     *
     * @var array
     */
    protected static $recordableEvents = ['created', 'deleted'];
}
