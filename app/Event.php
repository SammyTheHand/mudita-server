<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    public function path()
    {
        return "/events/{$this->id}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fences()
    {
        return $this->hasMany(Fence::class);
    }

    public function addFence($tag, $latitude, $longitude, $text, $textColour, $bgColour)
    {
        return $this->fences()->create(compact('tag', 'latitude', 'longitude', 'text', 'textColour', 'bgColour'));
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'event_members')->withTimestamps();
    }
}
