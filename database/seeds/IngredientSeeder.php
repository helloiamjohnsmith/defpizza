<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        $ingredients = [
            'reggiano cheese', 'mozzarella cheese', 'cheese',
            'pepperoni', 'bacon', 'pork',
            'beef', 'ham', 'chicken breast',
            'champignon', 'onion', 'red onion',
            'jalapeno pepper', 'oregano', 'sweet green pepper',
            'sweet red pepper', 'pineapples', 'tomatoes',
            'pickles', 'garlic', 'black olives',
            'olives', 'tomatoes', 'cheese sauce',
            'tom yam sauce', 'salmon', 'shrimps',
            'broccoli', 'cream sauce', 'pesto',
            'tomato sauce', 'balsamic caramel', 'minced meat',
            'bell pepper', 'corn', 'guacamole',
            'smoked potato', 'tartar sauce', 'zucchini',
            'eggplant', 'feta cheese', 'sorrel',
        ];

        $data = [];

        foreach($ingredients as $index => $ingredient) {
            $data[$index] = ['id' => $index + 1, 'title' => $ingredient];
        }

        DB::table('ingredients')->insert($data);
    }
}
