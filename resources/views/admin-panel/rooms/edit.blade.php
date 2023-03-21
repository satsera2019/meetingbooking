@extends('admin-panel.layouts.app')

@section('page_title')
    Room - Edit
@endsection

@section('content')
    <div class="card card-primary col-12">
        <div class="card-header">
            <h3 class="card-title">{{ $room['room_name'] ?? 'Room Name' }}</h3>
        </div>
        <form class="check-disable" action="{{ route('admin-panel.rooms.update', $room->id ?? 0) }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="room_number" class="required">Room Number</label>
                            <input type="number" class="form-control" name="room_number"
                                value="{{ $room['room_number'] ?? '' }}" placeholder="Enter Room Number" min="0">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="room_name" class="required">Room Name</label>
                            <input type="text" class="form-control" name="room_name" value="{{ $room['room_name'] }}"
                                placeholder="Enter Room Name">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="location" class="required">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ $room['location'] }}"
                                placeholder="Enter Room Location">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="capacity" class="required">Room Capacity</label>
                            <input type="number" class="form-control" name="capacity" value="{{ $room['capacity'] }}"
                                placeholder="Enter Room Capacity">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="equipment" class="required">Equipment</label>
                            <input type="text" class="form-control" name="equipment" value="{{ $room['equipment'] }}"
                                placeholder="Enter Room Equipment">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                @foreach ($room_statuses as $status)
                                    <option @if ($room['status'] == $status) selected @endif value="{{ $status }}">
                                        {{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if (count($room->bookingSlots) > 0)
                        <div class="col-12">
                            <div class="form-group clearfix">
                                @foreach ($day_of_weeks as $key => $day)
                                    <div class="row">
                                        <div class="form-group col-2">
                                            <input type="hidden" name="day_of_week[{{ $key }}][day_of_week]"
                                                value="{{ $key }}">
                                            <input type="checkbox" id="{{ $day }}"
                                                name="day_of_week[{{ $key }}][is_active]" value="1"
                                                @if ($room->bookingSlots[$key]['is_active']) checked @endif>
                                            <label for="{{ $day }}">{{ $day }}</label>
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="location">start time</label>
                                            <input type="time" class="form-control"
                                                name="day_of_week[{{ $key }}][start_time]"
                                                value="{{ $room->bookingSlots[$key]['start_time'] }}"
                                                step="600" min="09:00" max="17:00">
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="location">end time</label>
                                            <input type="time" class="form-control"
                                                name="day_of_week[{{ $key }}][end_time]"
                                                value="{{ $room->bookingSlots[$key]['end_time'] }}"
                                                step="600" min="09:00" max="17:00">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right btn-check-disable">
                    <i class="fa-solid fa-edit"></i> Edit
                    <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </button>
            </div>

        </form>
    </div>
@endsection
