<?php namespace App\Transformers;

class FenceTransformer extends Transformer {

    public function transform($fence)
    {
        return [
                'id' => $fence['id'],
                'tag' => $fence['tag'],
        ];
    }
}