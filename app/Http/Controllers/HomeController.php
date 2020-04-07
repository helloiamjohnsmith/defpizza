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

        $pizzas = Pizza::query();

        if ($request->filled('type')) {
            $pizzas->whereHas('types', function($query) use ($request){
                $query->where('slug', $request->type);
            });
        }

        $pizzas = $pizzas->get();

        return view('pages.home.home')
            ->withPizzas($pizzas)
            ->withTypes($types);
    }
}
