<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->boolean(50) ? User::all()->random()->id : null,
        'paid_at' => $faker->boolean(60) ? Carbon::now() : null,
        'by_cash' => $faker->boolean(40),
    ];
});
