<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeterminePizzaType extends Command
{
    protected $signature = 'pizza:type';

    protected $description = 'Update pizza types';

    public function handle()
    {
        $service = new \App\Actions\DeterminePizzaType();

        $service->run();
    }
}
