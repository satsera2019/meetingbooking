@extends('user-panel.layouts.app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Room Name</th>
                <th scope="col">Room Location</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->room->room_name }}</td>
                    <td>{{ $booking->room->location }}</td>
                    <td>{{ $booking->start_time }}</td>
                    <td>{{ $booking->end_time }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <div class="row">
                            <a href="">
                                <button type="button" class="btn btn-outline-primary btn-sm col"><i
                                        class="fa-solid fa-edit"></i> edit</button>
                            </a>
                            <button type="button" class="btn btn-outline-danger btn-sm col" data-bs-toggle="modal"
                                data-bs-target="#destroy-room-modal-{{ $booking->id }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
