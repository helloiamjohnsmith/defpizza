<?php

namespace App\Http\Livewire;

use App\Facades\Cart as CartFacade;
use Livewire\Component;

class ItemsList extends Component
{
    public $items;

    public $cart;

    public $message;

    public function mount()
    {
        $this->items = CartFacade::get()['items'];
    }

    public function render()
    {
        return view('livewire.items-list');
    }

    public function increase($id)
    {

    }

    public function decrease($id)
    {
        $this->message = 'TEST';
    }

    public function delete($id)
    {
        CartFacade::remove($id);
        $this->cart = CartFacade::get();
        $this->emit('productRemoved');
        $this->render();
    }


//
//    public function checkout()
//    {
//        CartFacade::clear();
//        $this->emit('clearCart');
//        $this->cart = CartFacade::get();
//    }

//    private function calc()
//    {
//        $grouped = collect($this->items)->groupBy('id');
//
//
//        $groupCount = $grouped->map(function ($item, $key) {
//            return collect($item)->count();
//        });
//    }
}
