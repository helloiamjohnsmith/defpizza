<?php

namespace App\Actions;


use App\Models\Order;
use App\Models\Pizza;

class StoreOrderItems
{
    public function run(Order $order, array $items)
    {
        foreach ($items as $item) {
            $pizza = Pizza::find(explode('-', $item['item_key'])[0]);

            $position = $pizza->items()->create(['title' => $item['title'], 'price_as_int' => $item['price']]);

            $order->items()->attach($position);
        }

        return $order->items;
    }
}