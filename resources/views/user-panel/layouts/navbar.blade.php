<nav class="navbar navbar-expand-lg bg-dark tod-bg-blue">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('tablet-panel.index') }}">
            <img src="{{ asset('images/icons/logo.svg') }}" class="d-block w-100" alt="icon">
        </a>
        <button class="navbar-toggler b-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (Request::segment(2) == 'index') active text-warning @else text-white @endif"
                        aria-current="page" href="{{ route('user-panel.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::segment(2) == 'bookings') active text-warning @else text-white @endif"
                        href="{{ route('user-panel.bookings.index') }}">My Bookings</a>
                </li>


            </ul>
            <ul class="navbar-nav ml-auto">

                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white"
                            href="{{ route('user-panel.bookings.create') }}">Book Now</a>
                    </li>
                    <li>
                        <a class="nav-link text-white" href="{{ route('user-panel.logout') }}">
                            <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>{{ __('Logout') }}
                        </a>
                    </li>
                @else
                    <li>
                        <a class="nav-link text-white" href="{{ route('user-panel.loginform') }}">
                            <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>{{ __('Login') }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
