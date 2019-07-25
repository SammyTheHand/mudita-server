<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Fence;
use Faker\Generator as Faker;

$factory->define(App\Fence::class, function (Faker $faker) {
    return [
        'tag' => $faker->sentence,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'text' => $faker->text,
        'textColour' => $faker->hexcolor,
        'bgColour' => $faker->hexcolor,
        'event_id' => factory(\App\Event::class)
    ];
});
