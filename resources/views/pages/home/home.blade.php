@extends ('layouts.master.master')

@section('content')

    <x-carousel/>

    <h2>{{ __('Choose your pizza') }}</h2>

    <livewire:fff>

    <livewire:show-pizzas>

@endsection

