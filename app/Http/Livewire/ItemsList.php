<?php

namespace App\Http\Livewire;

use App\Facades\Cart as CartFacade;
use Livewire\Component;

class ItemsList extends Component
{
    public $items;

    public $groupedItems;

    public $x;

    protected $listeners = [
        'itemAdded' => 'updateItems',
        'itemRemoved' => 'updateItems',
        'clearCart' => 'updateItems'
    ];

    public function mount()
    {
        $this->updateItems();

        $this->updateGroups();
    }

    public function render()
    {
        return view('livewire.items-list');
    }

    public function updateItems()
    {
        $this->items = CartFacade::get()['items'];
    }

    public function getTotalCostProperty()
    {
        return collect($this->items)->sum('price');
    }

    public function getItemsCountProperty()
    {
        return count($this->items);
    }

    public function increase($key)
    {
        if (isset($this->groupedItems[$key])) {
            CartFacade::add($this->groupedItems[$key][0]);
        }

        $this->updateItems();

        $this->updateGroups();

        $this->emit('itemAdded');
    }

    public function decrease($key)
    {
        if (isset($this->groupedItems[$key]) && count($this->groupedItems[$key]) > 1) {
            CartFacade::remove($this->groupedItems[$key][0]['id']);
        }

        $this->updateItems();

        $this->updateGroups();

        $this->emit('itemRemoved');
    }

    public function delete($key)
    {
        if (isset($this->groupedItems[$key])) {
            foreach ($this->groupedItems[$key] as $item) {
                CartFacade::remove($item['id']);
            }

            $this->updateItems();

            $this->updateGroups();

            $this->emit('itemRemoved');
        }
    }

    private function updateGroups()
    {
        $this->groupedItems = collect($this->items)
            ->sortBy('item_key')
            ->groupBy('item_key')
            ->toArray();
    }

}
