<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcludedIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excluded_ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->index(["item_id"], 'fk_excluded_ingredients_items1_idx');
            $table->index(["ingredient_id"], 'fk_excluded_ingredients_ingredients1_idx');

            $table->foreign('ingredient_id', 'fk_excluded_ingredients_ingredients1_idx')
                ->references('id')
                ->on('ingredients')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('item_id', 'fk_excluded_ingredients_items1_idx')
                ->references('id')
                ->on('items')
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
        Schema::dropIfExists('excluded_ingredients');
    }
}
