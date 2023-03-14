<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminPanel</title>
    {{-- adminlte.min.css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    {{-- toastr.min.css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <!-- jquery js -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- toastr js -->
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
</head>

<body>
    <div class="container py-5">
        @yield('content')
    </div>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>

</body>


@if (session()->has('errors'))
    <script>
        toastr.error("{{ session()->get('errors') }}");
    </script>
@endif

</html>
