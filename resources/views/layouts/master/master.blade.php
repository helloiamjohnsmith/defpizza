<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

@include('layouts.master.partials._head')

<body class="d-flex flex-column h-100">

@include('layouts.master.partials.header._base')

@include('layouts.master.partials.content._base')

@include('layouts.master.partials.footer._base')

</body>