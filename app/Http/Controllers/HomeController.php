<?php

namespace App\Http\Controllers;

use App\Facades\Cart as CartFacade;
use App\Models\Promo;
use Carbon\Carbon;

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

    public function promos()
    {
        $promos = Promo::where('ended_at', '>=', Carbon::now())->get();

        return view('pages.promos')->withPromos($promos);
    }

    public function checkout()
    {
        $items = CartFacade::get()['items'];

        $groupedItems = collect($items)
            ->sortBy('item_key')
            ->groupBy('item_key')
            ->toArray();

        $sum = collect($items)->sum('price');

        $deliveryInfo = request()->session()->get('delivery');

        $promo = $deliveryInfo['promo'];

        $total = $sum + $deliveryInfo['type']['price'];

        if ($promo) {
            $total = ceil($total - $total * ($promo->discount / 100));
        }

        return view('pages.checkout')
            ->withGroupedItems($groupedItems)
            ->withSum($sum)
            ->withDeliveryInfo($deliveryInfo)
            ->withPromo($promo)
            ->withTotal($total);
    }
}
