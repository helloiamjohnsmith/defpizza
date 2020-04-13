<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryTypesTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('priority');
            $table->integer('min_sum')->nullable();
            $table->integer('price');
        });

        $types = [
            ['title' => 'Free', 'priority' => 1, 'min_sum' => 50, 'price' => 0],
            ['title' => 'Standard', 'priority' => 2, 'min_sum' => NULL, 'price' => 10],
            ['title' => 'Express', 'priority' => 3, 'min_sum' => NULL, 'price' => 15],
        ];

        DB::table('delivery_types')->insert($types);
    }

    public function down()
    {
        Schema::dropIfExists('delivery_types');
    }
}
