<?php

use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\Promo::class, 5)->create();
    }
}
