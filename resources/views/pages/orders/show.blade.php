@extends ('layouts.master.master')

@section('content')

    <div class="container">
        <div class="my-5">
            <h4 class="mt-3">{{ __('Order details') }}</h4>
            <dl class="row my-3">
                <dt class="col-sm-3">{{ __('Order number') }}</dt>
                <dd class="col-sm-9">{{ $order->number }}</dd>

                <dt class="col-sm-3">{{ __('Date') }}</dt>
                <dd class="col-sm-9">@datetime($order->created_at)</dd>

                <dt class="col-sm-3">{{ __('State') }}</dt>
                <dd class="col-sm-9">{{ $order->state->title }}</dd>

                <dt class="col-sm-3">{{ __('Address') }}</dt>
                <dd class="col-sm-9">{{ $order->address->street }} {{ $order->address->city }}</dd>

                <dt class="col-sm-3">{{ __('Delivery type') }}</dt>
                <dd class="col-sm-9">{{ $order->deliveryType->title }}</dd>

                @isset($promo)
                    <dt class="col-sm-3">{{ __('Promo') }}</dt>
                    <dd class="col-sm-9">{{ $promo->title }}</dd>
                @endisset
            </dl>
            <table class="table table-bordered table-hover table-orders mt-1">
                <thead>
                <tr>
                    <th></th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Cost') }}</th>
                </tr>

                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td class="text-nowrap" style="width: 1%">{{ $loop->iteration }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td class="text-right">{{ $item->price_as_int }} &euro;</td>
                    </tr>
                @endforeach
                @if($order->deliveryType->price > 0)
                    <tr>
                        <td colspan="2">
                            {{ __('Delivery') }}
                        </td>
                        <td class="text-right">{{ $order->deliveryType->price }}&nbsp;&euro;</td>
                    </tr>
                @endif
                @if($order->appliedPromo)
                    <tr>
                        <td colspan="2">
                            {{ __('Promo') }}
                        </td>
                        <td class="text-right">&ndash;{{ $order->appliedPromo->discount }}&nbsp;%</td>
                    </tr>
                @endif
                <tr>
                    <td class="font-weight-bolder" colspan="2">
                        {{ __('Total') }}
                    </td>
                    <td class="font-weight-bolder text-right">{{ $order->total }}&nbsp;&euro;</td>
                </tr>
                </tbody>
            </table>


        </div>
    </div>

@endsection