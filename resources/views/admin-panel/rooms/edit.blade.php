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

                    {{-- {{ $room->bookingSlots }} --}}
                    <div class="col-12">
                        <div class="form-group clearfix">
                            @foreach ($room->bookingSlots as $slot)
                                <div class="row">
                                    <div class="form-group col-1">
                                        <input type="checkbox" id="{{ $slot->day }}"
                                            name="day_of_week[{{ $slot->day_of_week }}]['day']"
                                            value="{{ $slot->day }}" checked>
                                        <label for="monday">{{ $slot->day }}</label>
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="location">start time</label>
                                        <input type="time" class="form-control"
                                            name="day_of_week[{{ $slot->day_of_week }}]['start_time']"
                                            value="{{ $slot->start_time }}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="location">end time</label>
                                        <input type="time" class="form-control"
                                            name="day_of_week[{{ $slot->day_of_week }}]['end_time']"
                                            value="{{ $slot->end_time }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                   






                    {{-- <div class="col-12">
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="monday" name="day_of_week[1]" value="monday" checked>
                                <label for="monday">Monday</label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="tuesday" name="day_of_week[2]" value="tuesday" checked>
                                <label for="tuesday">Tuesday</label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="wednesday" name="day_of_week[3]" value="wednesday" checked>
                                <label for="wednesday">Wednesday</label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="thursday" name="day_of_week[4]" value="thursday" checked>
                                <label for="thursday">Thursday</label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="friday" name="day_of_week[5]" value="friday" checked>
                                <label for="friday">Friday</label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="saturday" name="day_of_week[6]" value="saturday">
                                <label for="saturday">Saturday</label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="sunday" name="day_of_week[7]" value="sunday">
                                <label for="sunday">Sunday</label>
                            </div>
                        </div>
                    </div> --}}








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
