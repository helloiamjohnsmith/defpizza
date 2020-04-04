<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->timestamp('paid_at')->nullable();
            $table->tinyInteger('by_cash')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id'], 'fk_payments_users1_idx');
            $table->index(['order_id'], 'fk_payments_orders1_idx');

            $table->foreign('user_id', 'fk_payments_users1_idx')
                ->references('id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('order_id', 'fk_payments_orders1_idx')
                ->references('id')
                ->on('orders')
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
        Schema::dropIfExists('payments');
    }
}
