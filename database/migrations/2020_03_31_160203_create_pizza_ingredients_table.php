<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_ingredients', function (Blueprint $table) {
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->primary(['pizza_id', 'ingredient_id']);

            $table->foreign('pizza_id', 'fk_pizza_ingredients_pizzas1_idx')
                ->references('id')
                ->on('pizzas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ingredient_id', 'fk_pizza_ingredients_ingredients1_idx')
                ->references('id')
                ->on('ingredients')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_ingredients');
    }
}
