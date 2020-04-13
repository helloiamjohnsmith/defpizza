@extends ('layouts.master.master')

@section('content')

    @if($user->verified)
        @if(count($orders) == 0)
            <div class="alert alert-info dp-alert">
                You doesn't have any order yet
            </div>
        @else
            @include('pages.orders._orders-table')
        @endif
    @else
        <div class="alert alert-warning dp-alert">
            You have to verify email before we can show your orders
            <div>
                <form class="mt-3" method="post" action="{{ route('user.email.verify', $user) }}">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-primary" type="submit">{{ __('Verify email') }}</button>
                </form>
            </div>
        </div>
    @endif



@endsection
