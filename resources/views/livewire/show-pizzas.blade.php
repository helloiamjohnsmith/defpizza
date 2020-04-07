<div class="row" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="col mb-3">
        @foreach($types as $type)
            <button class="btn btn-pizza btn-pill" wire:click="$set('message', '{{ $type->slug }}')">
{{--                wire:click="setType('{{ $type->slug}}')"--}}
                {{ ucfirst($type->title) }}
            </button>
        @endforeach
    </div>
</div>
<input wire:model="message" type="text">

<h1>{{ $message }}</h1>
<div class="row">
    <div class="col-12">
        <div class="pizza-cards">
            <div class="pizza-cards__section">
                @foreach($pizzas as $pizza)
                    <livewire:pizza-card :pizza="$pizza" :key="$pizza->id">
                @endforeach
            </div>
        </div>
    </div>
</div>


