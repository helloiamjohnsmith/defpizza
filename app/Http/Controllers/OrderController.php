<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.orders')
            ->withOrders($user->orders)
            ->withUser($user);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Order $order)
    {
        //
    }
}
