@extends('admin-panel.layouts.app')
@section('content')
    <div class="row">
        @foreach ($users as $user)
            {{ $user->first_name }}
            {{ $user->last_name }}
            {{ $user->email }}
            {{ $user->role }}
        @endforeach
    </div>
@endsection
