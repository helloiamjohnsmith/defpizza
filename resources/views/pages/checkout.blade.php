@extends ('layouts.master.master')

@section('content')

    <div class="container">
        <div class="my-5 ">
            <h2>{{ __('Checkout') }}</h2>

            <h4 class="mt-3">{{ __('Order details') }}</h4>
            <dl class="row my-3">
                <dt class="col-sm-3">{{ __('Address') }}</dt>
                <dd class="col-sm-9">{{ $deliveryInfo['contacts']['street'] }} {{ $deliveryInfo['contacts']['city'] }}</dd>

                <dt class="col-sm-3">{{ __('Delivery type') }}</dt>
                <dd class="col-sm-9">{{ $deliveryInfo['type']['title'] }}</dd>

                @isset($promo)
                    <dt class="col-sm-3">{{ __('Promo') }}</dt>
                    <dd class="col-sm-9">{{ $promo->title }}</dd>
                @endisset
            </dl>
            <table class="table table-bordered table-hover table-orders mt-1">
                <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Size') }}</th>
                    <th>{{ __('Quantity') }}</th>
                    <th>{{ __('Cost') }}</th>
                </tr>

                </thead>
                <tbody>
                @foreach($groupedItems as $key => $items)
                    @php $item = $items[0] @endphp
                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td class="text-center">{{ $item['size'] }} cm</td>
                        <td class="text-right">{{ count($items) }}</td>
                        <td class="text-right">{{ count($items) *  $item['price']}} &euro;</td>
                    </tr>
                @endforeach
                @if($deliveryInfo['type']['price'])
                    <tr>
                        <td colspan="3">
                            {{ __('Delivery') }}
                        </td>
                        <td class="text-right">{{ $deliveryInfo['type']['price'] }}&nbsp;&euro;</td>
                    </tr>
                @endif
                @isset($promo)
                    <tr>
                        <td colspan="3">
                            {{ __('Promo') }}
                        </td>
                        <td class="text-right">&ndash;{{ $promo->discount }}&nbsp;%</td>
                    </tr>
                @endisset
                <tr>
                    <td colspan="3" class="font-weight-bolder">
                        {{ __('Total') }}
                    </td>
                    <td class="font-weight-bolder text-right">{{ $total }}&nbsp;&euro;/ {{ $totalUsd }}&nbsp;&dollar;</td>
                </tr>
                </tbody>
            </table>

            <div class="d-flex">
                <form class="ml-auto" action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </form>
            </div>

        </div>
    </div>

@endsection