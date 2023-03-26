@extends('tablet-panel.layouts.app')
@section('content')
    <div class="row py-5">
        <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($room->images as $key => $image)
                    <div class="carousel-item  @if ($key == 0) active @endif">
                        <img src="{{ asset('images/room_image/' . $image->image_url) }}" class="d-block w-100"
                            alt="Room image">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="col-12">
            <h4>Room Number</h4>
            <p>{{ $room->room_number }}</p>
        </div>
        <div class="col-12">
            <h4>Room Name</h4>
            <p>{{ $room->room_name }}</p>
        </div>
        <div class="col-12">
            <h4>Location</h4>
            <p>{{ $room->location }}</p>
        </div>
        <div class="col-12">
            <h4>Capacity</h4>
            <p>{{ $room->capacity }}</p>
        </div>
        <div class="col-12">
            <h4>Room Features</h4>
            <p>{{ $room->equipment }}</p>
        </div>


        <div class="col-12 text-center mt-3 mb-3">
            <button type="button" class="btn btn-success col-11 blue-btn" data-bs-toggle="modal"
                data-bs-target="#bookModal">
                Book Now
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="bookModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('tablet-panel.booking.create', $room) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="user_id">
                                    <option selected value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
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
                </div>
            </div>
        </div>
    </div>
@endsection
