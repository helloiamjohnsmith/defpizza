<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $pizzas = Pizza::all();

        return view('home')
            ->withPizzas($pizzas);
    }
}
