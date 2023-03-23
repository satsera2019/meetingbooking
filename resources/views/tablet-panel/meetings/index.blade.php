@extends('tablet-panel.layouts.app')
@section('content')
        meetings index

        @foreach ($bookings as $book)
            {{$book}}
        @endforeach
@endsection