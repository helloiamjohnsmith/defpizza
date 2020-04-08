<div>
    <div class="row">
        <div class="col mb-3">
            @foreach($types as $type)
                <button class="btn btn-pizza btn-pill {{ $currentType == $type->slug ? 'active' : '' }}" wire:click="$set('currentType', '{{ $type->slug }}')">
                    {{ ucfirst($type->title) }}
                </button>
            @endforeach
                <button class="btn btn-pizza btn-pill {{ $currentType == '' ? 'active' : '' }}" wire:click="$set('currentType', '')">
                    {{ __('All') }}
                </button>
        </div>
    </div>

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
</div>



