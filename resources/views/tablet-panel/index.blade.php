@extends('tablet-panel.layouts.app')
@section('content')
    @if (count($room_bookings) == 0)
        <h4 class="text-center">There is no booking</h4>
    @else
        <ul class="list-group">
            @foreach ($room_bookings as $booking)
                <li class="list-group-item list-group-item-dark">
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
