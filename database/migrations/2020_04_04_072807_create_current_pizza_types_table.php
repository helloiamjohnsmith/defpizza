<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentPizzaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_pizza_types', function (Blueprint $table) {
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('type_id');

            $table->index(['pizza_id', 'type_id']);

            $table->primary(['pizza_id', 'type_id']);

            $table->foreign('pizza_id')
                ->references('id')
                ->on('pizzas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('type_id')
                ->references('id')
                ->on('pizza_types')
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
        Schema::dropIfExists('current_pizza_types');
    }
}
