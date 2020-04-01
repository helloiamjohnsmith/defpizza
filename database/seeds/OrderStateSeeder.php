<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStateSeeder extends Seeder
{
    public function run()
    {
        $states = [
            ['title' => 'Pending', 'finished' => false],
            ['title' => 'Awaiting payment', 'finished' => false],
            ['title' => 'Awaiting shipment', 'finished' => false],
            ['title' => 'Completed', 'finished' => true],
            ['title' => 'Cancelled', 'finished' => true],
        ];

        DB::table('order_states')->insert($states);
    }
}
