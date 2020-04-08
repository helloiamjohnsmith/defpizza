<?php

namespace App\Http\Livewire;

use App\Facades\Cart as CartFacade;
use Livewire\Component;

class Cart extends Component
{
    public $total = 0;

    protected $listeners = [
        'itemAdded' => 'updateTotal',
        'itemRemoved' => 'updateTotal',
        'clearCart' => 'updateTotal'
    ];

    public function mount()
    {
        $this->total = count(CartFacade::get()['items']);
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function updateTotal(): void
    {
        $this->total = count(CartFacade::get()['items']);
    }

}
