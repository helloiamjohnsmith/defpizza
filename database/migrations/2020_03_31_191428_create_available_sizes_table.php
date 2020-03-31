<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('size_id');

            $table->primary(['pizza_id', 'size_id']);

            $table->foreign('pizza_id', 'fk_available_sizes_pizzas1_idx')
                ->references('id')
                ->on('pizzas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('size_id', 'fk_available_sizes_sizes1_idx')
                ->references('id')
                ->on('sizes')
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
        Schema::dropIfExists('available_sizes');
    }
}
