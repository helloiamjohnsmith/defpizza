<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pizza_id');
            $table->integer('price');
            $table->timestamp('started_at');
            $table->timestamp('ended_at');
            $table->timestamps();
            $table->softDeletes();

            $table->index(["pizza_id"], 'fk_pizza_prices_pizzas1_idx');

            $table->foreign('pizza_id', 'fk_pizza_prices_pizzas1_idx')
                ->references('id')
                ->on('pizzas')
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
        Schema::dropIfExists('pizza_prices');
    }
}
