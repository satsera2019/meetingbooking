@extends('admin-panel.layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <div class="row justify-content-center py-5">
        <div class="card col-lg-4 col-md-6 col-12">
            <div class="card-body login-card-body">
                <div class="card card-info">
                    <div class="card-header tod-bg-blue">
                        <h3 class="card-title"></h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('user-panel.login') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info blue-btn">Sign in</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
