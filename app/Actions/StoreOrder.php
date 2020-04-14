<?php


namespace App\Actions;


use App\Models\Order;
use App\Models\OrderState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoreOrder
{
    public function run(array $data, StoreAddress $actionStoreAddress): Order
    {
        $items = $data['items'];

        $sum = collect($items)->sum('price');

        $deliveryInfo = $data['delivery'];

        $promo = $deliveryInfo['promo'];

        $total = $sum + $deliveryInfo['type']['price'];

        if ($promo) {
            $total = ceil($total - $total * ($promo->discount / 100));
        }

        $order = new Order();

        $order->email = Auth::check() ? Auth::user()->email : $deliveryInfo['user']['email'];
        $order->number = Str::random(10);
        $order->total = $total;

        if (Auth::check()) {
            $order->owner_id = Auth::id();
        }

        $order->state_id = OrderState::where('title', 'Awaiting payment')->first()->id;
        $order->delivery_type_id = $deliveryInfo['type']['id'];

        if ($promo) {
            $order->applied_promo_id = $promo->id;
        }

        $address = $actionStoreAddress->run([
            'street' => $deliveryInfo['contacts']['street'],
            'city' => $deliveryInfo['contacts']['city'],
            'owner_id' => $order->owner_id,
        ]);

        $order->address_id = $address->id;

        $order->save();

        return $order;
    }
}