<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function cart()
    {
        return view('pages.cart');
    }
}
