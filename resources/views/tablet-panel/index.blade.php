@extends('tablet-panel.layouts.app')
@section('content')
    @if (!isset($room) || empty($room))
        <h3 class="text-center">There is no Room.</h3>
    @else
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">{{ $room->room_number }} {{ $room->room_name }}</h3>
            </div>
        </div>
        <div
            class="card mb-4 
        @if ($room->status === App\Models\Room::ROOM_STATUSES['BOOKED_STATUS']) bg-warning
        @elseif($room->status === App\Models\Room::ROOM_STATUSES['AVAILABLE_STATUS']) 
            bg-success 
        @elseif($room->status === App\Models\Room::ROOM_STATUSES['UNAVAILABLE_STATUS']) 
            bg-danger @endif">
            <div class="card-body text-white">
                <h4 class="text-center">{{ $room->status }}</h4>
            </div>
        </div>
    @endif

    @if (count($room_bookings) == 0)
        <h4 class="text-center">There is no booking.</h4>
    @else
        <ul class="list-group">
            @foreach ($room_bookings as $booking)
                <li
                    class="list-group-item list-group-item-dark
                @if ($booking->start_time <= date('Y-m-d H:i:s') && $booking->end_time >= date('Y-m-d H:i:s')) active
                @elseif($booking->end_time < date('Y-m-d H:i:s'))
                    disabled @endif
                ">
                    <div class="row">
                        <div class="col">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</div>
                        <div class="col">{{ $booking->room->room_number }} {{ $booking->room->room_name }}</div>
                        <div class="col">{{ $booking->start_time }}</div>
                        <div class="col">{{ $booking->end_time }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
