@extends('user-panel.layouts.app')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form class="check-disable" action="" method="GET">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="room_number" class="required">Room Number</label>
                                    <input type="number" class="form-control" name="room_number"
                                        value="{{ old('room_number') }}" placeholder="Enter Room Number">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="room_name" class="required">Room Name</label>
                                    <input type="text" class="form-control" name="room_name"
                                        value="{{ old('room_name') }}" placeholder="Enter Room Name">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="location" class="required">Location</label>
                                    <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                                        placeholder="Enter Location">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="capacity" class="required">Room Capacity</label>
                                    <input type="number" class="form-control" name="capacity" value="{{ old('capacity') }}"
                                        placeholder="Enter Room Capacity">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="equipment" class="required">Equipment</label>
                                    <input type="text" class="form-control" name="equipment"
                                        value="{{ old('equipment') }}" placeholder="Enter Equipment">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right btn-check-disable">
                            <i class="fa-solid fa-search"></i> Search
                            <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        @foreach ($rooms as $room)
            <div class="card" style="width: 18rem;">
                {{-- @foreach ($room->images as $image)
                    <img src="{{ asset('images/room_image/' . $image->image_url) }}" class="card-img-top" alt="...">
                @endforeach --}}
                <img src="{{ asset('images/room_image/' . $room->images[0]->image_url) }}" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $room->room_number }}</h5>
                    <p class="card-text">{{ $room->room_name }}</p>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#create-modal-{{ $room->id }}">
                        Book Now
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="create-modal-{{ $room->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $room->name ?? 'Room' }} Booking </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('user-panel.bookings.store', $room) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="datetime-local" class="form-control" id="start_time" name="start_time"
                                        value="{{ old('start_time') }}"
                                        {{-- min="{{ date('Y-m-d\TH:i', strtotime('now')) }}" --}}
                                        {{-- step='86400' --}}
                                        >
                                </div>
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="datetime-local" class="form-control" id="end_time" name="end_time"
                                        value="{{ old('end_time') }}"
                                        {{-- min="{{ date('Y-m-d\TH:i', strtotime('now')) }}" --}}
                                        {{-- step='86400' --}}
                                        >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
