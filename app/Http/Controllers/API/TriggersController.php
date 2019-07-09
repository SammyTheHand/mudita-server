<?php

namespace App\Http\Controllers\API;

use App\Trigger;

class TriggersController extends APIController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $trigger = new Trigger;

        $trigger->title = 'Testing';

        $trigger->save();

        return $this->respond('OK');
    }
}