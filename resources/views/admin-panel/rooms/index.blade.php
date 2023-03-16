@extends('admin-panel.layouts.app')
@section('content')

    <div class="col-12">
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
                                    <input type="text" class="form-control" name="location"
                                        value="{{ old('location') }}" placeholder="Enter Location">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="capacity" class="required">Room Capacity</label>
                                    <input type="number" class="form-control" name="capacity"
                                        value="{{ old('capacity') }}" placeholder="Enter Room Capacity">
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


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h3 class="card-title">Users</h3>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('admin-panel.rooms.create') }}">
                            <button type="button" class="btn btn-outline-primary btn-sm col"><i class="fa fa-plus"></i>Add
                                Room</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Room Number</th>
                            <th>Room Name</th>
                            <th>Location</th>
                            <th>Capacity</th>
                            <th>Equipment</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->room_number ?? "-" }}</td>
                                <td>{{ $room->room_name ?? "-" }}</td>
                                <td>{{ $room->location ?? "-" }}</td>
                                <td>{{ $room->capacity ?? "-" }}</td>
                                <td>{{ $room->equipment ?? "-" }}</td>
                                <td>{{ $room->status ?? "-" }}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('admin-panel.rooms.edit', $room) }}">
                                            <button type="button" class="btn btn-outline-primary btn-sm col"><i
                                                    class="fa-solid fa-edit"></i> edit</button>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm col"><i
                                                class="fa fa-trash"></i> delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
