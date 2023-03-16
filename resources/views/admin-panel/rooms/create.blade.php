@extends('admin-panel.layouts.app')

@section('page_title')
    Room - Create
@endsection

@section('content')
    <div class="card card-primary col-12">
        <div class="card-body">add room</div>
    </div>
    <div class="card card-primary col-12">
        <form class="check-disable" action="{{ route('admin-panel.rooms.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="room_number" class="required">Room Number</label>
                            <input type="number" class="form-control" name="room_number" value="{{ old('room_number') }}"
                                placeholder="Enter Room Number" min="0">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="room_name" class="required">Room Name</label>
                            <input type="text" class="form-control" name="room_name" value="{{ old('room_name') }}"
                                placeholder="Enter Room Name">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="location" class="required">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                                placeholder="Enter Room Location">
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
                            <input type="text" class="form-control" name="equipment" value="{{ old('equipment') }}"
                                placeholder="Enter Room Equipment">
                        </div>
                    </div>

                    <div class="col-12">
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
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right btn-check-disable">
                    <i class="fa-solid fa-add"></i> Create
                    <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </button>
            </div>
        </form>
    </div>
@endsection
