<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePizzaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('title');
        });

        $types = [
            ['slug' => 'vegetarian', 'title' => 'vegetarian'],
            ['slug' => 'new', 'title' => 'new'],
            ['slug' => 'spicy', 'title' => 'spicy'],
            ['slug' => 'for-kids', 'title' => 'for kids'],
            ['slug' => 'healthy', 'title' => 'healthy'],
        ];

        DB::table('pizza_types')->insert($types);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_types');
    }
}
