<?php

namespace App\Http\Livewire;

use App\Models\Pizza;
use App\Models\PizzaType;
use Livewire\Component;

class ShowPizzas extends Component
{
    public $currentType;

    protected $updatesQueryString = [
        ['type' => ['except' => '']]
    ];

    public function mount()
    {
        $this->currentType = '';
    }

    public function render()
    {
        $pizzas = Pizza::query();

        $type = $this->currentType;

        if ($type != '') {
            $pizzas->whereHas('types', function ($query) use ($type) {
                $query->where('slug', $type);
            });
        }

        $pizzas = $pizzas->get();

        return view('livewire.show-pizzas')
            ->withPizzas($pizzas)
            ->withTypes(PizzaType::all());
    }
}
