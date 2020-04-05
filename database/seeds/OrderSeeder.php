<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Order::class, 100)
            ->create()
            ->each(function ($order) {
                $order->payments()->createMany(factory(App\Models\Payment::class, rand(0, 3))->make()->toArray());
            });
    }
}
