<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PromoSeeder::class);
        $this->call(PizzaSeeder::class);
    }
}
