@extends('user-panel.layouts.app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Room Name</th>
                <th scope="col">Room Location</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($bookings) === 0)
                <td colspan="12" class="text-center">No data available in table.</td>
            @else
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->room->room_name }}</td>
                        <td>{{ $booking->room->location }}</td>
                        <td>{{ $booking->start_time }}</td>
                        <td>{{ $booking->end_time }}</td>
                        <td>
                            <div class="row">
                                <a href="" class="col">
                                    <button type="button" class="btn btn-outline-primary btn-sm w-100"><i
                                            class="fa-solid fa-edit"></i> edit</button>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm col" data-bs-toggle="modal"
                                    data-bs-target="#destroy-booking-modal-{{ $booking->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                                </button>
                            </div>
                        </td>
                    </tr>


                    <div class="modal fade" id="destroy-booking-modal-{{ $booking->id }}" tabindex="-1"
                        aria-labelledby="destroy-booking-modal-{{ $booking->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="destroy-booking-modal-{{ $booking->id }}">Delete
                                        Booking</h1>
                                </div>
                                <div class="modal-body d-flex flex-column align-items-center">
                                    {{ $booking->id }}
                                </div>
                                <form action="{{ route('user-panel.bookings.destroy', ['booking' => $booking]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-success float-right">
                                            Yes
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                            No
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
