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
            $table->boolean('for_kids')->default(false);
            $table->boolean('vegetarian')->default(false);
            $table->boolean('sea')->default(false);
            $table->boolean('healthy')->default(false);
            $table->boolean('meat')->default(false);
            $table->integer('spicy')->default(false);
        });

        $ingredients = [
            ['title' => 'reggiano cheese', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 0],
            ['title' => 'mozzarella cheese', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 0],
            ['title' => 'cheese', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 0],
            ['title' => 'pepperoni', 'for_kids' => true, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => true, 'spicy' => 0],
            ['title' => 'bacon', 'for_kids' => false, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => true, 'spicy' => 0],
            ['title' => 'pork', 'for_kids' => false, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => true, 'spicy' => 0],
            ['title' => 'basil', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'beef', 'for_kids' => false, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => true, 'spicy' => 0],
            ['title' => 'ham', 'for_kids' => false, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => true, 'spicy' => 0],
            ['title' => 'chicken breast', 'for_kids' => true, 'vegetarian' => false, 'sea' => false, 'healthy' => true, 'meat' => true, 'spicy' => 0],
            ['title' => 'champignon', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'onion', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'red onion', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 1],
            ['title' => 'jalapeno pepper', 'for_kids' => false, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 3],
            ['title' => 'oregano', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'sweet green pepper', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 2],
            ['title' => 'sweet red pepper', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 2],
            ['title' => 'pineapples', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'tomatoes', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'pickles', 'for_kids' => false, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 0],
            ['title' => 'garlic', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 1],
            ['title' => 'black olives', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'olives', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'cheese sauce', 'for_kids' => true, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 0],
            ['title' => 'tom yam sauce', 'for_kids' => false, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 1],
            ['title' => 'salmon', 'for_kids' => true, 'vegetarian' => false, 'sea' => true, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'shrimps', 'for_kids' => true, 'vegetarian' => false, 'sea' => true, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'crab', 'for_kids' => true, 'vegetarian' => false, 'sea' => true, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'seaweed', 'for_kids' => true, 'vegetarian' => true, 'sea' => true, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'lobster', 'for_kids' => true, 'vegetarian' => false, 'sea' => true, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'broccoli', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'cream sauce', 'for_kids' => false, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 0],
            ['title' => 'pesto', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'tomato sauce', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'balsamic caramel', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 0],
            ['title' => 'minced meat', 'for_kids' => true, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => true, 'spicy' => 0],
            ['title' => 'bell pepper', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'corn', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'guacamole', 'for_kids' => false, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 3],
            ['title' => 'smoked potato', 'for_kids' => false, 'vegetarian' => true, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 1],
            ['title' => 'tartar sauce', 'for_kids' => false, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 1],
            ['title' => 'zucchini', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'eggplant', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
            ['title' => 'feta cheese', 'for_kids' => true, 'vegetarian' => false, 'sea' => false, 'healthy' => false, 'meat' => false, 'spicy' => 0],
            ['title' => 'sorrel', 'for_kids' => true, 'vegetarian' => true, 'sea' => false, 'healthy' => true, 'meat' => false, 'spicy' => 0],
        ];
//
//        $data = [];
//
//        foreach($ingredients as $index => $ingredient) {
//            $data[$index] = ['id' => $index + 1, 'title' => $ingredient];
//        }

        DB::table('ingredients')->insert($ingredients);
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
