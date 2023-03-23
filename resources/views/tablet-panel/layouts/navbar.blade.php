<nav class="navbar navbar-expand-lg fixed-bottom bg-blue">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('tablet-panel.index') }}">
            <img src="{{ asset('images/icons/logo.svg') }}" class="d-block w-100" alt="icon">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-around w-100">
                <li class="nav-item">
                    <a class="nav-link text-white pe-auto @if (Request::segment(2) == 'index') active @endif"
                        aria-current="page" href="{{ route('tablet-panel.rooms.index') }}">
                        <i class="fa fa-solid fa-grip"></i>
                        Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white pe-auto @if (Request::segment(2) == 'bookings') active @endif"
                        href="{{ route('tablet-panel.meetings') }}">
                        <i class="fa fa-duotone fa-calendar-days"></i>
                        Meetings</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- <div class="burger-div">
    <i class="fa-solid fa-bars"></i>
</div> --}}

<button type="button" class="btn btn-lg btn-primary rounded-circle blue-btn btn-booking" data-bs-toggle="modal"
    data-bs-target="#exampleModalXl">
    <i class="fa-solid fa-bars"></i>
</button>

<div class="modal fade" id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalXlLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalXlLabel">Booking Now</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
