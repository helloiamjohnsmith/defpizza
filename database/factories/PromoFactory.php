<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Promo;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Promo::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'code' => Str::random(5),
        'started_at' => Carbon::now()->subDays(rand(0, 30)),
        'ended_at' => Carbon::now()->addDays(rand(0, 30)),
        'discount' => rand(15, 50),
    ];
});
