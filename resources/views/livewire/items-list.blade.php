<div>
    @empty($items)
        <div class="alert alert-info dp-alert">
            Your shoppping cart is empty. <a href="/">Let's start</a> pizza shopping!
        </div>
    @else
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

                    </div>
                    <div class="cart-item__price">{{ $item['price'] }}&nbsp;&euro;</div>
                    <div class="cart-item__delete">
                        <button class="cart-item__button" wire:click="delete('{{ $item['id'] }}')">
                            <i data-feather="x-circle"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endempty
</div>
