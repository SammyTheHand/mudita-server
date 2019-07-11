<?php

namespace App\Http\Controllers\API;

use App\Event;
use App\Transformers\EventTransformer;

class EventsController extends APIController
{
    /**
    * @var \App\Transformers\EventTransformer
    */
    protected $eventTransformer;

    function __construct(EventTransformer $eventTransformer)
    {
        $this->eventTransformer = $eventTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return $this->Respond([
            'data' => $this->eventTransformer->transformCollection($events->all())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        if ( !$event) 
        {
            return $this->respondNotFound('Event does not exist');
        }

        return $this->respond([
            'data' => $this->eventTransformer->transform($event)
        ]);
    }
}
