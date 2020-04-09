@extends('layouts.auth.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ __('Reset Password') }}</h2>


                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @include('auth.passwords._email-form')
            </div>
        </div>
    </div>
@endsection
