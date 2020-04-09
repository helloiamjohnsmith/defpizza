@extends ('layouts.master.master')

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success dp-alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="profile d-flex">

        <div class="col-12 col-md-3 profile__menu">
            @if(null === $user->email_verified_at)
                <form class="mb-3" method="post" action="{{ route('user.email.verify') }}">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-primary" type="submit">{{ __('Verify email') }}</button>
                </form>
            @endif
                <a href="{{ route('orders.index') }}">{{ __('My orders') }}</a>
        </div>

        <div class="col-12 col-md-6 profile__form">
            @include('pages._profile-form')
        </div>

    </div>

@endsection
