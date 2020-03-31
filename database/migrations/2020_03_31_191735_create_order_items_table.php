<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_id');
            $table->timestamps();

            $table->index(["item_id"], 'fk_order_items_items1_idx');
            $table->index(["order_id"], 'fk_order_items_orders1_idx');

            $table->foreign('order_id', 'fk_order_items_orders1_idx')
                ->references('id')
                ->on('orders')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('item_id', 'fk_order_items_items1_idx')
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
        Schema::dropIfExists('order_items');
    }
}
