@extends('admin-panel.layouts.app')

@section('page_title')
    User - Create
@endsection

@section('content')
    <div class="card card-primary col-12">
        <div class="card-body">add user</div>
    </div>
    <div class="card card-primary col-12">
        <form class="check-disable" action="{{ route('admin-panel.users.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="first_name" class="required">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="last_name" class="required">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="email" class="required">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="password" class="required">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
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
