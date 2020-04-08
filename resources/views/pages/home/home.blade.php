@extends ('layouts.master.master')

@section('content')

    <x-carousel/>

    <h2>{{ __('Choose your pizza') }}</h2>

    <livewire:show-pizzas>

@endsection

