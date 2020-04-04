<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PizzaPrice;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(PizzaPrice::class, function (Faker $faker) {
    return [
        'price_as_int' => rand(5, 15),
        'started_at' => Carbon::now()->subDays(rand(1, 90)),
        'ended_at' => Carbon::now()->addDays(rand(1, 90)),
    ];
});
