<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\PizzaType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $types = PizzaType::all();

        return view('pages.home.home')
            ->withTypes($types);
    }
}
