<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Fence;
use Faker\Generator as Faker;

$factory->define(App\Fence::class, function (Faker $faker) {
    return [
        'tag' => $faker->sentence,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'event_id' => factory(\App\Event::class)
    ];
});
