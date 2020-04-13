<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }

    public function index()
    {
        $user = Auth::user();

        return view('pages.orders.index')
            ->withOrders($user->orders)
            ->withUser($user);
    }

    public function show(Order $order)
    {
        return view('pages.orders.show')
            ->withOrder($order);
    }
}
