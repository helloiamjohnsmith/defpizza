<div>
    @empty($items)
        <div class="alert alert-info dp-alert">
            Your shoppping cart is empty. <a href="/">Let's start</a> pizza shopping!
        </div>
    @else
        <div class="mt-5">
            <h2>Your shopping cart</h2>
        </div>

        {{--                    <div>--}}
        {{--                        {{ dd($groupedItems['4-1']) }}--}}
        {{--                    </div>--}}

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
                <div class="cart-item">
                    <div class="cart-item__image">
                        {{ $x }}
                    </div>
                    <div class="cart-item__info">
                        <div class="cart-item__title"><button class="btn btn-primary" wire:click="dx()">X</button> </div>
                    </div>
                    <div class="cart-item__actions">
                        <div class="cart-item__quantity">{{ $this->itemsCount }} {{ $this->itemsCount > 1 ? 'pizzas' : 'pizza' }}</div>
                    </div>
                    <div class="cart-item__price">for {{ $this->totalCost }}&nbsp;&euro;</div>

                </div>
        </div>
    @endempty
</div>
