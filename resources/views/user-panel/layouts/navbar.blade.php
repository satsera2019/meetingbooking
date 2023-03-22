<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user-panel.index') }}">Meeting Booking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(Request::segment(2) == 'index') active @endif" aria-current="page" href="{{ route('user-panel.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Request::segment(2) == 'bookings') active @endif" href="{{ route('user-panel.bookings.index') }}">My Bookings</a>
                </li>


            </ul>
            <ul class="navbar-nav ml-auto">

                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white" href="{{ route('user-panel.bookings.create') }}">Book Now</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('user-panel.logout') }}">
                            <i class="nav-icon fa fa-sign-out mr-2" aria-hidden="true"></i>{{ __('Logout') }}
                        </a>
                    </li>
                @else
                    <li>
                        <a class="nav-link" href="{{ route('user-panel.loginform') }}">
                            <i class="nav-icon fa fa-sign-out mr-2" aria-hidden="true"></i>{{ __('Login') }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
