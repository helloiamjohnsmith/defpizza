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
            <button class="btn btn-pizza btn-pill">Hit!</button>
            <button class="btn btn-pizza btn-pill">Spicy</button>
            <button class="btn btn-pizza btn-pill">Without onion</button>
            <button class="btn btn-pizza btn-pill">Without mushrooms</button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="holland">
                <div class="holland__body">
                    <a class="link" href="#">Go to there</a> baby
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="holland">
                <div class="holland__body">
                    Hello
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="holland">
                <div class="holland__body">
                    Hello
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="holland">
                <div class="holland__body">
                    Hello
                </div>
            </div>
        </div>
    </div>

@endsection

