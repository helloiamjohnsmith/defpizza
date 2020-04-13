@extends('layouts.auth.auth')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ __('Please introduce yourself') }}</h2>

            @include('auth._login-form')
        </div>
    </div>
</div>
@endsection
