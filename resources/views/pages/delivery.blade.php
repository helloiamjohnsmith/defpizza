@extends ('layouts.master.master')

@section('content')

    <div class="container">

        @if($empty)
            <div class="alert alert-info dp-alert">
                There is nothing to deliver. <a href="/">Add some pizza</a> to your cart.
            </div>
        @else
            <div class="my-5 ">
                <h2>{{ __('Delivery') }}</h2>

                <div class="row">
                    <div class="col-12 col-md-8">
                        @include('pages._delivery-form')
                    </div>
                </div>

            </div>
        @endif
    </div>

@endsection