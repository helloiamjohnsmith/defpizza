<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    public function run()
    {
        $ingredients = App\Models\Ingredient::all();

        factory(App\Models\Pizza::class, 20)->create()->each(function ($pizza) use($ingredients) {
//            $numOfIngredients = rand(3, 8);
//
//            while($numOfIngredients > 0) {
//                $pizza->ingredients()->attach()
//            }
            $pizza->ingredients()->attach(
                $ingredients->random(rand(3, 8))->pluck('id')->toArray()
            );
        });
    }
}
