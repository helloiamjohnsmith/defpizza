<?php

use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            ['size' => '20', 'weight_k' => 1.0],
            ['size' => '25', 'weight_k' => 1.2],
            ['size' => '30', 'weight_k' => 1.3],
            ['size' => '40', 'weight_k' => 1.5],
        ];

        DB::table('sizes')->insert($sizes);
    }
}
