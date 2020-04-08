<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Size;
use Illuminate\Support\Str;
use Livewire\Component;

class PizzaCard extends Component
{
    public $pizza;

    public $price;

    public $weight;

    public $size;

    public function mount($pizza)
    {
        $this->pizza = $pizza;
        $this->size = $pizza->availableSizes->first();

        $price = $pizza->actualPrice->price_as_int;

        $this->price = ceil($price * $this->size->price_k);
        $this->weight = ceil($pizza->weight * $this->size->weight_k);
    }

    public function render()
    {
        return view('livewire.pizza-card');
    }

    public function updateSize($id)
    {
        $this->size = Size::find($id);

        $this->price = ceil($this->pizza->actualPrice->price_as_int * $this->size->price_k);
        $this->weight = ceil($this->pizza->weight * $this->size->weight_k);
    }

    public function addPizza()
    {
        $item = [
            'id' => Str::random(10),
            'item_key' => $this->pizza->id . '-' . $this->size->id,
            'title' => $this->pizza->title,
            'size' => $this->size->size,
            'price' => $this->price,
            'image' => $this->pizza->image,
        ];

        Cart::add($item);

        $this->emit('itemAdded');
    }
}
