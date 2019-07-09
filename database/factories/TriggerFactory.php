<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Trigger;
use Faker\Generator as Faker;

$factory->define(Trigger::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
    ];
});
