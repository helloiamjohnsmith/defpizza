<?php

use App\Models\Ingredient;
use App\Models\Size;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    public function run()
    {
        $ingredients = Ingredient::all();
        $sizes = Size::all();

        factory(App\Models\Pizza::class, 30)->create()->each(function ($pizza) use ($ingredients, $sizes) {
            $pizza->ingredients()->attach(
                $ingredients->random(rand(3, 8))->pluck('id')->toArray()
            );

            $pizza->availableSizes()->attach(
                $sizes->random(rand(1, 3))->pluck('id')->toArray()
            );

            $pizza->prices()->save(factory(App\Models\PizzaPrice::class)->make());
        });
    }
}
