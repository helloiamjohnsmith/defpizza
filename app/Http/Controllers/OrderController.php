<?php

namespace App\Http\Controllers;

use App\Actions\StoreAddress;
use App\Actions\StoreOrder;
use App\Actions\StoreOrderItems;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Facades\Cart as CartFacade;

class OrderController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('pages.orders.index')
            ->withOrders($user->orders)
            ->withUser($user);
    }

    public function store(Request $request, StoreOrder $storeOrder, StoreAddress $storeAddress, StoreOrderItems $storeOrderItems)
    {
        $data['items'] = CartFacade::get()['items'];
        $data['delivery'] = $request->session()->get('delivery');

        $order = $storeOrder->run($data, $storeAddress);

        $storeOrderItems->run($order, $data['items']);

        $request->session()->forget(['cart', 'delivery']);

        return redirect(route('success'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return view('pages.orders.show')
            ->withOrder($order);
    }
}
