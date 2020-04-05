<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->boolean(80) ? $faker->firstNameMale : null,
        'last_name' => $faker->lastName,
        'phone' => $faker->boolean(50) ? $faker->phoneNumber : null,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'sex' => $faker->boolean(50) ? 'M' : 'F',
        'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
