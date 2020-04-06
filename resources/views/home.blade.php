@extends ('layouts.master.master')

@section('content')

    <x-carousel/>

    <h2>{{ __('Choose your pizza') }}</h2>

    <div class="row">
        <div class="col mb-3">
            <button class="btn btn-pizza btn-pill">New</button>
            <button class="btn btn-pizza btn-pill">Without meat</button>
            <button class="btn btn-pizza btn-pill">Vegetarian</button>
            <button class="btn btn-pizza btn-pill">For kids</button>
            <button class="btn btn-pizza btn-pill">Healthy</button>
            <button class="btn btn-pizza btn-pill">Diet</button>
            <button class="btn btn-pizza btn-pill">Spicy</button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="d-flex">
                @foreach($pizzas as $pizza)
                    <div class="pizza-card">
                        <div class="pizza-card__wrapper">
                            <div class="pizza-card__image">
                                <img src="{{ $pizza->image }}">
                            </div>
                            <div class="pizza-card__header">
                                {{ $pizza->title }}
                            </div>
                            <div>
                                {{ $pizza->description }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

