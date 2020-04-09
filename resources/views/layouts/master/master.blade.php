<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

@include('layouts.master.partials._head')

<body class="h-100" style="padding-top: 2rem;">
    <div id="app" class="d-flex flex-column h-100">

        @include('layouts.master.partials.header._base')

        @include('layouts.master.partials.content._base')

        @include('layouts.master.partials.footer._base')

    </div>

    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script>
        feather.replace()
    </script>

    @livewireScripts
</body>
