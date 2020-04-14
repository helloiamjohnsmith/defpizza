<?php

namespace App\Http\Controllers;

use App\Actions\StoreDeliveryInformation;
use App\Facades\Cart as CartFacade;
use App\Models\DeliveryType;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function delivery()
    {
        $sum = collect(CartFacade::get()['items'])->sum('price');

        $empty = count(CartFacade::get()['items']) < 1;

        $deliveryTypes = DeliveryType::whereNull('min_sum')
            ->orWhere('min_sum', '<=', $sum)
            ->get();

        return view('pages.delivery')
            ->withEmpty($empty)
            ->withDeliveryTypes($deliveryTypes);
    }

    public function storeDeliveryInfo(Request $request, StoreDeliveryInformation $action)
    {
        $action->run($request->all());

        return redirect(route('checkout'));
    }
}
