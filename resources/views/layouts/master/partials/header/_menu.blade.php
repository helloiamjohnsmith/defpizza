<div class="collapse navbar-collapse" id="dpNavbar">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link dp-nav-link disabled" href="/" aria-disabled="true">{{ __('Menu') }}</a>
        </li>
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link dp-nav-link" href="#">{{ __('Promo') }}</a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link dp-nav-link" href="#">{{ __('Contacts') }}</a>--}}
        {{--        </li>--}}
        @guest
            <li class="nav-item">
                <a class="nav-link dp-nav-link" href="{{ route('login') }}"><i data-feather="log-in"></i></a>
            </li>
        @else
            @include('layouts.master.partials.header._user')
        @endguest

        <livewire:cart>
    </ul>


</div>

