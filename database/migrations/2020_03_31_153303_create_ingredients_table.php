<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
