<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PromoSeeder::class);
        $this->call(PizzaSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
