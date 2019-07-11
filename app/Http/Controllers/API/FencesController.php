<?php

namespace App\Http\Controllers\API;

use App\Event;
use App\Fence;
use App\Transformers\EventTransformer;
use App\Transformers\FenceTransformer;

class FencesController extends APIController
{
    /**
    * @var \App\Transformers\FenceTransformer
    * @var \App\Transformers\EventTransformer
    */
    protected $fenceTransformer;
    protected $eventTransformer;

    public function __construct(FenceTransformer $fenceTransformer, EventTransformer $eventTransformer)
    {
        $this->fenceTransformer = $fenceTransformer;
        $this->eventTransformer = $eventTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($eventID = null, $fenceID = null)
    {
        if (!$eventID) {
            $fences = Fence::all();
            return $this->Respond([
                'fences' => $this->fenceTransformer->transformCollection($fences->all())
            ]);
        }

        $fences = $this->getFences($eventID);

        if (!$fences) {
            return $this->respondNotFound('Fences do not exist');
        } else {
            $event = $fences->first()->event;
            return $this->Respond([
                'event' => $this->eventTransformer->transform($event),
                'fences' => $this->fenceTransformer->transformCollection($fences->all())
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $fences = Fence::find($id);

        if (!$fences) {
            return $this->respondNotFound('Fence does not exist');
        }

        return $this->respond([
            'data' => $this->fenceTransformer->transform($fences)
        ]);
    }

    private function getFences($eventID)
    {
        $event = Event::find($eventID);
        if (!$event) {
            return null;
        } else {
            return Event::find($eventID)->fences;
        }
    }
}
