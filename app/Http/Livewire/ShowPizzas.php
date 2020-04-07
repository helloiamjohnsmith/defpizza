<?php

namespace App\Http\Livewire;

use App\Models\Pizza;
use App\Models\PizzaType;
use Livewire\Component;

class ShowPizzas extends Component
{
    public $type;

    public $message;

//    protected $updatesQueryString = [
//        ['type' => ['except' => '']]
//    ];

    public function mount()
    {
        $this->type = 'sea-food';

        $this->message = 'Ini';
    }

    public function render()
    {
        $pizzas = Pizza::query();

        $type = $this->type;

        if ($type != null) {
            $pizzas->whereHas('types', function ($query) use ($type) {
                $query->where('slug', $type);
            });
        }

if (strlen ($this->message ) > 5) {
    dd($this->message);
}

        $pizzas = $pizzas->get();

//        if ($type != null) {
//            dd($pizzas);
////            $pizzas->dd();
//        }


        return view('livewire.show-pizzas')
            ->withPizzas($pizzas)
            ->withTypes(PizzaType::all());
    }

    public function setType($type)
    {
        $this->type = $type;

//        $this->render();
    }
}
