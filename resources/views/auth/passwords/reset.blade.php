@extends('layouts.auth.auth')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ __('New password') }}</h2>

            @include('auth.passwords._reset-form')
        </div>
    </div>
</div>
@endsection
