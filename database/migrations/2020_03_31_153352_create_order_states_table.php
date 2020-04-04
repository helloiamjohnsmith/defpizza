<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->tinyInteger('finished');
        });

        $states = [
            ['title' => 'Pending', 'finished' => false],
            ['title' => 'Awaiting payment', 'finished' => false],
            ['title' => 'Awaiting shipment', 'finished' => false],
            ['title' => 'Completed', 'finished' => true],
            ['title' => 'Cancelled', 'finished' => true],
        ];

        DB::table('order_states')->insert($states);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_states');
    }
}
