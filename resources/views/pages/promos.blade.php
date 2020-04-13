@extends ('layouts.master.master')

@section('content')

    <div>
        @empty($promos)
            <div class="alert alert-info dp-alert">
                There are no active promos :(
            </div>
        @else
            <div class="mt-5">
                <h2>Our promo actions</h2>

                <div class="promos">
                @foreach($promos as $promo)
                    <div class="promo">
                        <div class="promo__info">
                            <div class="promo__title">{{ $promo->title }}</div>
                            <div class="promo__date">{{ __('Valid until') }} @date($promo->ended_at)</div>
                        </div>
                        <div class="promo__code">
                            <span>{{ $promo->code }}</span>
                        </div>
                        <div class="promo__discount">
                            {{ $promo->discount }}&nbsp;%
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        @endempty
    </div>

@endsection