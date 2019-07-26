<?php namespace App\Transformers;

class FenceTransformer extends Transformer {

    public function transform($fence)
    {
        return [
                'id' => $fence['id'],
                'tag' => $fence['tag'],
                'latitude' => $fence['latitude'],
                'longitude' => $fence['longitude'],
                'text' => $fence['text'],
                'textColour' => $fence['textColour'],
                'bgColour' => $fence['bgColour'],
        ];
    }
}