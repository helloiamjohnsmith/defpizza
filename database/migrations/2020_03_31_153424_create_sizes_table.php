<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('size');
            $table->double('weight_k');
        });

        $sizes = [
            ['size' => '20', 'weight_k' => 1.0],
            ['size' => '25', 'weight_k' => 1.2],
            ['size' => '30', 'weight_k' => 1.3],
            ['size' => '40', 'weight_k' => 1.5],
        ];

        DB::table('sizes')->insert($sizes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}
