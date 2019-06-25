<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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

    public function addFence($tag)
    {
    	return $this->fences()->create(compact('tag'));
    }
}
