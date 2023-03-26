@extends('tablet-panel.layouts.app')
@section('content')
    <div class="row justify-content-around">

        @if (count($rooms) == 0)
            <h3 class="text-center text-secondary">No data available.</h3>
        @else
            @foreach ($rooms as $room)
                <div class="card col-6 py-3" style="width: 29rem;">
                    <img width="100" src="{{ asset('images/room_image/' . $room->images[0]->image_url) }}"
                        class="card-img-top" alt="Room image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->room_number }}</h5>
                        <p class="card-text">{{ $room->room_name ?? 'Room Name' }}</p>
                        <a href="{{ route('tablet-panel.rooms.detail', $room) }}" class="btn btn-primary blue-btn">View Details</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
