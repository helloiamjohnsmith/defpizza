<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Def Pizza')</title>
    <meta name="description" content="Pizza making and delivery service">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='robots' content='noindex,nofollow'/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.master.partials._favicon')

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @stack('css')

    <script src="https://unpkg.com/feather-icons"></script>
</head>
