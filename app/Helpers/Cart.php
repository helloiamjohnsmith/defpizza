<?php


namespace App\Helpers;

class Cart
{
    public function __construct()
    {
        if ($this->get() === null) {
            $this->set($this->empty());
        }
    }

    public function add(array $item)
    {
        $cart = $this->get();
        array_push($cart['items'], $item);
        $this->set($cart);
    }

    public function remove($id)
    {
        $cart = $this->get();
        array_splice($cart['items'], array_search($id, array_column($cart['items'], 'id')), 1);
        $this->set($cart);
    }

    public function clear()
    {
        $this->set($this->empty());
    }

    public function empty()
    {
        return [
            'items' => [],
        ];
    }

    public function get()
    {
        return request()->session()->get('cart');
    }

    private function set($cart): void
    {
        request()->session()->put('cart', $cart);
    }
}
