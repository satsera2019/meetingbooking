<nav class="navbar navbar-expand-lg fixed-bottom tod-bg-blue">
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
                    <a class="nav-link text-white pe-auto fw-bold @if (Request::segment(2) == 'rooms') tod-color-light @endif"
                        aria-current="page" href="{{ route('tablet-panel.rooms.index') }}">
                        <i class="fa fa-solid fa-grip"></i>
                        ROOMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white pe-auto fw-bold @if (Request::segment(2) == '') tod-color-light @endif"
                        aria-current="page" href="{{ route('tablet-panel.index') }}">
                        <i class="fa fa-solid fa-home"></i>
                        HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white pe-auto fw-bold @if (Request::segment(2) == 'meetings') tod-color-light @endif"
                        href="{{ route('tablet-panel.meetings') }}">
                        <i class="fa fa-duotone fa-calendar-days"></i>
                        MEETINGS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<button type="button" class="btn btn-lg btn-primary rounded-circle blue-btn btn-booking" data-bs-toggle="modal"
    data-bs-target="#exampleModalXl">
    <i class="fa-solid fa-plus"></i>
</button>

<div class="modal fade" id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalXlLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalXlLabel">Booking Now</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (!isset($room))
                There is no active room.
            @else
                <form action="{{ route('tablet-panel.booking.create', $room) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="user_id">
                                <option selected>Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Start Time</label>
                            <input type="datetime-local" class="form-control" id="start_time" name="start_time">
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">End Time</label>
                            <input type="datetime-local" class="form-control" id="end_time" name="end_time">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success blue-btn">book</button>
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>
