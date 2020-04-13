<div>
    @empty($items)
        <div class="alert alert-info dp-alert">
            Your shoppping cart is empty. <a href="/">Let's start</a> pizza shopping!
        </div>
    @else
        <div class="mt-5">
            <h2>Your shopping cart</h2>
        </div>

        <div class="cart-items">
            @foreach($groupedItems as $key => $items)
                @php $item = $items[0] @endphp
                <div class="cart-item">
                    <div class="cart-item__image">
                        <img width="65px" src="{{ asset('/images/pizzas') . '/' . $item['image']}}">
                    </div>
                    <div class="cart-item__info">
                        <div class="cart-item__title">{{ $item['title'] }}</div>
                        <div class="cart-item__size">{{ $item['size'] }} cm</div>
                    </div>
                    <div class="cart-item__actions">
                        <button class="cart-item__button" wire:key="x-{{ $loop->index }}"
                                wire:click="decrease('{{  $item['item_key']}}')">
                            <i class="far fa-minus-square"></i>
                        </button>
                        <div class="cart-item__quantity">{{ count($items) }}</div>

                        <button class="cart-item__button" wire:click="increase('{{ $item['item_key'] }}')">
                            <i class="far fa-plus-square"></i>
                        </button>
                    </div>
                    <div class="cart-item__price">{{ $item['price'] }}&nbsp;&euro;</div>
                    <div class="cart-item__delete">
                        <button class="cart-item__button" wire:click="delete('{{ $item['item_key'] }}')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            @endforeach
            <div class="cart-total">
                <div class="cart-total__title">
                    {{ __('Total') }}
                </div>
                <div class="cart-total__cost">
                    <strong>{{ $this->itemsCount }}</strong> {{ $this->itemsCount > 1 ? 'pizzas' : 'pizza' }} for
                    <strong>{{ $this->totalCost }}&nbsp;&euro;</strong></div>
            </div>
            @if( $this->totalCost < 50)
                <div class="d-flex">
                    <small>{{ __('Free delivery starts at') }} 50 &euro;</small>
                </div>
            @endif
            <div class="d-flex">
                <div class="ml-auto">
                    <a href="{{ route('delivery') }}" class="btn btn-primary" role="button">{{ __('Proceed') }}</a>
                </div>
            </div>
        </div>
    @endempty
</div>
