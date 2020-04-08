<div>
    <div class="d-flex justify-content-between">
        <div class="">
            <h2>Your shopping cart</h2>
        </div>
    </div>

    <div class="cart-items">
        @foreach($items as $item)
            <div class="cart-item">
                <div class="cart-item__image">
                    <img width="65px" src="{{ asset('/images/pizzas') . '/' . $item['image']}}">
                </div>
                <div class="cart-item__info">
                    <div class="cart-item__title">{{ $item['title'] }}</div>
                    <div class="cart-item__size">{{ $item['size'] }} cm</div>
                </div>
                <div class="cart-item__actions">
                    <button class="cart-item__button" wire:key="x-{{ $loop->index }}" wire:click="decrease('{{  $item['id']}}')">
                        <i data-feather="minus-circle"></i>
                    </button>
                    <div class="cart-item__quantity">3</div>

                    <button class="cart-item__button" wire:click="increase('{{ $item['id'] }}')">
                        <i data-feather="plus-circle"></i>
                    </button>
                </div>
                <div class="cart-item__price">{{ $item['price'] }}&nbsp;&euro;</div>
                <div class="cart-item__delete">
                    <div wire:click="delete('{{ $item['id'] }}')">DEL</div>
                    <button class="cart-" wire:click="delete('{{ $item['id'] }}')">
                        <i data-feather="x-circle"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
