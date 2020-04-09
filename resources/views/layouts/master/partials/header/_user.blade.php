<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle dp-nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i data-feather="user"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item dp-dropdown-item" href="{{ route('user.profile.show')  }}">{{ __('Profile') }}</a>
        <a class="dropdown-item dp-dropdown-item" href="{{ route('orders.index') }}">{{ __('Orders') }}</a>
        <div class="dropdown-divider"></div>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item dp-dropdown-item" href="">{{ __('Logout') }}</button>
        </form>

    </div>
</li>

