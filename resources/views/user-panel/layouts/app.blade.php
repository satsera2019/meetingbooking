<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meeting Booking</title>
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">


    <!-- jQuery v3.6.4 -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>


    {{-- toastr.min.css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <!-- toastr v2.1.3 js -->
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.min.css') }}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body>
    @include('user-panel.layouts.navbar')
    <div class="container py-5">
        @yield('content')
    </div>
</body>


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- bootstrap.min.js -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- fullCalendar 2.2.5 -->
{{-- <script src="../plugins/moment/moment.min.js"></script> --}}
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>






@if (session()->has('errors'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ session()->get('errors')->first() }}");
        });
    </script>
@endif

@if (session()->has('message'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ session()->get('message') }}");
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        $(document).ready(function() {
            alert();
            toastr.error("{{ session()->get('error') }}");
        });
    </script>
@endif

</html>
