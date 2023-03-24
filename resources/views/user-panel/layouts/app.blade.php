<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meeting Booking</title>

    <!-- jQuery v3.6.4 -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- font-awesome/6.3.0 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    {{-- toastr.min.css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <!-- toastr v2.1.3 js -->
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

    {{-- main.css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    @include('user-panel.layouts.navbar')
    <div class="container py-5">
        @yield('content')
    </div>
</body>

<!-- bootstrap.min.js -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

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
            toastr.error("{{ session()->get('error') }}");
        });
    </script>
@endif

</html>
