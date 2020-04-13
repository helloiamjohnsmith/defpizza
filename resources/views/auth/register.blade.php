@extends('layouts.auth.auth')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ __('Register') }}</h2>

                @include('auth._register-form')
            </div>
        </div>
    </div>
@endsection
