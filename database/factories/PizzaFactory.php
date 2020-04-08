<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pizza;
use Faker\Generator as Faker;

$factory->define(Pizza::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->word),
        'description' => ucfirst($faker->paragraph),
        'image' => rand(1, 10) . '.jpg',
        'weight' => rand(400, 600),
        'carbohydrate' => rand(10, 40),
        'fat' => rand(5, 30),
        'protein' => rand(5, 20),
        'energy' => rand(150, 300)
    ];
});
