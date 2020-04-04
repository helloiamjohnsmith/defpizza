<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(App\Models\User::class, 50)
            ->create()
            ->each(function ($user) {
                $user->payments()->createMany(factory(App\Models\Payment::class, 3)->make()->toArray());
            });
    }
}
