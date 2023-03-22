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
                                    <label for="start_time" class="required">Start Time</label>
                                    <input type="date" class="form-control" name="start_time"
                                        value="{{ old('start_time') }}" placeholder="Enter Start Time">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="end_time" class="required">End Time</label>
                                    <input type="date" class="form-control" name="end_time" value="{{ old('end_time') }}"
                                        placeholder="Enter End Time">
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


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Room Name</th>
                <th scope="col">Room Location</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->room->room_name }}</td>
                    <td>{{ $booking->room->location }}</td>
                    <td>{{ $booking->start_time }}</td>
                    <td>{{ $booking->end_time }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
