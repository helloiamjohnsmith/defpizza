<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function cart()
    {
        Log::emergency("Hello World");
        Log::alert("Hello World");
        Log::critical("Hello World");
        Log::error("Hello World");
        Log::warning("Hello World");
        Log::notice("Hello World");
        Log::info("Hello World");
        Log::debug("Hello World");

        return view('pages.cart');
    }
}
