<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('number');
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('applied_promo_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(["applied_promo_id"], 'fk_orders_promos1_idx');
            $table->index(["owner_id"], 'fk_orders_users_idx');
            $table->index(["state_id"], 'fk_orders_order_states1_idx');

            $table->foreign('owner_id', 'fk_orders_users_idx')
                ->references('id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('state_id', 'fk_orders_order_states1_idx')
                ->references('id')
                ->on('order_states')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('applied_promo_id', 'fk_orders_promos1_idx')
                ->references('id')
                ->on('promos')
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
        Schema::dropIfExists('orders');
    }
}
