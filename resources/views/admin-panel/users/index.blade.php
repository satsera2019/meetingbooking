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
                                    <label for="first_name" class="required">First Name</label>
                                    <input type="text" class="form-control" name="first_name"
                                        value="{{ old('first_name') }}" placeholder="Enter First Name">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="last_name" class="required">Last Name</label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="{{ old('last_name') }}" placeholder="Enter Last Name">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        placeholder="Enter Email">
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
                            <th>Registration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('admin-panel.users.edit', $user) }}">
                                            <button type="button" class="btn btn-outline-primary btn-sm col"><i
                                                    class="fa-solid fa-edit"></i> edit</button>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#destroy-user-modal-{{ $user->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="destroy-user-modal-{{ $user->id }}" tabindex="-1"
                                aria-labelledby="destroy-user-modal-{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="destroy-user-modal-{{ $user->id }}">Delete
                                                User</h1>
                                        </div>
                                        <div class="modal-body d-flex flex-column align-items-center">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </div>
                                        <form action="{{ route('admin-panel.users.destroy', ['user' => $user]) }}"
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
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>
@endsection
