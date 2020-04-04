<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('price_as_int');
            $table->unsignedBigInteger('itemable_id');
            $table->string('itemable_type');

            $table->index(["itemable_id"], 'fk_items_pizzas1_idx');

            $table->foreign('itemable_id', 'fk_items_pizzas1_idx')
                ->references('id')->on('pizzas')
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
        Schema::dropIfExists('items');
    }
}
