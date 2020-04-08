<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CartFacadeServiceProvider extends ServiceProvider
{
    public function register()
    {
        App::bind('cart',function() {
            return new \App\Helpers\Cart();
        });
    }
}
