<div class="collapse navbar-collapse" id="dpNavbar">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link dp-nav-link" href="/">{{ __('Menu') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link dp-nav-link @if(request()->is('login')) disabled @endif " href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link dp-nav-link @if(request()->is('register')) disabled @endif"
                   href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    </ul>
</div>

