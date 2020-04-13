<table class="table table-bordered table-hover table-orders">
    <thead>
    <tr>
        <th></th>
        <th>{{ __('Number') }}</th>
        <th>{{ __('Created at') }}</th>
        <th>{{ __('State') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td class="text-nowrap text-center" style="width: 1%">{{ $loop->iteration }}</td>
            <td>
                <a href="{{ route('orders.show', $order) }}">
                    #{{ $order->number }}
                </a>
            </td>
            <td class="text-nowrap text-center" style="width: 1%">@datetime($order->created_at)</td>
            <td class="text-nowrap text-center" style="width: 1%">{{ $order->state->title }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
