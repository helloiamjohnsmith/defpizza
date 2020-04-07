@extends ('layouts.master.master')

@section('content')

    <x-carousel/>

    <h2>{{ __('Choose your pizza') }}</h2>

    @include('pages.home._type')

    <div class="row">
        <div class="col-12">
            <div class="pizza-cards">
                <div class="pizza-cards__section">
                    @foreach($pizzas as $pizza)
                        <div class="pizza-card">
                            <div class="pizza-card__wrapper">
                                <div class="pizza-card__image">
                                    <img src="{{ $pizza->image }}">
                                </div>
                                <div class="pizza-card__header">
                                    {{ $pizza->title }}
                                </div>
                                <div class="pizza-card__body">
                                    {{ $pizza->description }}
                                </div>
                                <div class="pizza-card__footer">
                                    <div class="pizza-card__info">
                                        <div class="pizza-card__price">
                                            {{ $pizza->actualPrice->price_as_int }} &euro;
                                        </div>
                                        <div class="pizza-card__sizes">
                                            <div class="btn-group btn-group-sm" role="group">
                                                @foreach($pizza->availableSizes as $size)
                                                    <button type="button" class="btn btn-secondary">{{ $size->size }}&nbsp;cm</button>
                                                @endforeach
                                            </div>

                                        </div>

                                    </div>
                                    <div class="pizza-card__box">
                                        <button class="btn btn-outline-primary ml-auto">To cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

