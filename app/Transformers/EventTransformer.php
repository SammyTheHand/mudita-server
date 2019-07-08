<?php namespace App\Transformers;

class EventTransformer extends Transformer {

    public function transform($event)
    {
        return [
                'id' => $event['id'],
                'title' => $event['title'],
                'description' => $event['description']
        ];
    }
}

