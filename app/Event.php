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

    public function addFence($tag)
    {
    	return $this->fences()->create(compact('tag'));
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

}
