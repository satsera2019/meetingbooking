@extends('admin-panel.layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h3 class="card-title">Users</h3>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('admin-panel.users.create') }}">
                            <button type="button" class="btn btn-outline-primary btn-sm col"><i class="fa fa-plus"></i>Add
                                User</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($rooms as $room) --}}
                            <tr>
                                {{-- <td>{{ $room->first_name }}</td>
                                <td>{{ $room->last_name }}</td>
                                <td>{{ $room->email }}</td>
                                <td>{{ $room->role }}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('admin-panel.rooms.edit', $room) }}">
                                            <button type="button" class="btn btn-outline-primary btn-sm col"><i
                                                    class="fa-solid fa-edit"></i> edit</button>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm col"><i
                                                class="fa fa-trash"></i> delete</button>
                                    </div>
                                </td> --}}

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="row">
                                        <a href="">
                                            <button type="button" class="btn btn-outline-primary btn-sm col"><i
                                                    class="fa-solid fa-edit"></i> edit</button>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm col"><i
                                                class="fa fa-trash"></i> delete</button>
                                    </div>
                                </td>
                            </tr>
                        {{-- @endforeach --}}
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
