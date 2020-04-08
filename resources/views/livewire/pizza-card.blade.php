<div class="pizza-card" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="pizza-card__wrapper">
        <div class="pizza-card__image">
            <img src="{{ asset('/images/pizzas/' . $pizza->image) }}">
        </div>
        <div class="pizza-card__header">
            <div class="pizza-card__title">
                {{ $pizza->title }} @if($pizza->availableSizes->count() == 1) <small>({{ $pizza->availableSizes->first()->size }}&nbsp;cm)</small> @endif
            </div>
            <div class="pizza-card__weight">
                {{ $weight }}&nbsp;g
            </div>
        </div>
        <div class="pizza-card__body">
            <div class="row">
                <div class="col">
                    <h6>{{ __('Food energy (per 100g)') }}</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <span>{{ __('Carbohydrate') }}</span>
                    <div>{{ $pizza->carbohydrate }}</div>
                </div>
                <div class="col-3">
                    <span>{{ __('Protein') }}</span>
                    <div>{{ $pizza->protein }}</div>
                </div>
                <div class="col-2">
                    <span>{{ __('Fat') }}</span>
                    <div>{{ $pizza->fat }}</div>
                </div>
                <div class="col-3">
                    <span>{{ __('Energy') }}</span>
                    <div>{{ $pizza->energy }}</div>
                </div>
            </div>
            <div class="my-2">
                <h6>{{ __('Ingredients') }}</h6>
                <p class="my-2 font-weight-light">
                    {{ $pizza->ingredients->pluck('title')->implode(', ') }}
                </p>
            </div>
            {{ $pizza->description }}
        </div>
        <div class="pizza-card__footer">
            <div class="pizza-card__info">
                <div class="pizza-card__price">
                    {{ $price }} &euro;
                </div>
                <div class="pizza-card__sizes">
                    <div class="btn-group btn-group-sm" role="group">
                        @if($pizza->availableSizes->count() > 1)
                            @foreach($pizza->availableSizes as $size)
                                <button type="button" class="btn btn-secondary"
                                        wire:click="updateSize({{ $size->id }})">
                                    {{ $size->size }}&nbsp;cm
                                </button>
                            @endforeach
                        @endif
                    </div>

                </div>

            </div>
            <div class="pizza-card__box">
                <button class="btn btn-outline-primary ml-auto" wire:click="addPizza()">To cart</button>
            </div>
        </div>
    </div>
</div>
