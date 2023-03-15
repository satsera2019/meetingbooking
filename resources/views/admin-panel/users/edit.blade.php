@extends('admin-panel.layouts.app')

@section('page_title')
    User - Edit
@endsection

@section('content')
    <div class="card card-primary col-12">
        <div class="card-header">
            <h3 class="card-title">{{ $user["first_name"] ?? "User Name" }} {{ $user["last_name"] ?? "User Name" }}</h3>
        </div>
        <form class="check-disable" action="{{ route("admin-panel.users.update", $user->id ?? 0) }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <input type="hidden" name="user_id" value="{{$user->id ?? 0}}">
                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" value="{{ $user['first_name'] ?? ''}}" class="form-control" name="first_name" placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" value="{{ $user['last_name'] ?? ''}}" class="form-control" name="last_name" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{ $user["email"] ?? ''}}" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role" required>
                                <option @if($user["role"] == 'user') selected @endif value="user">user</option>
                                <option @if($user["role"] == 'admin') selected @endif value="admin">admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                    </div>
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
