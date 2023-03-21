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
    {{-- font-awesome/6.1.2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery v3.6.4 -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- toastr v2.1.3 js -->
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
</head>

<body>
    <div class="wraper">
        @if (Auth::check())
            @include('admin-panel.layouts.dashboard')
            <div class="content-wrapper">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container-fluid">
                @yield('content')
            </div>
        @endif
    </div>
    <!-- adminlte.min.js -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <!-- bootstrap.min.js v5.3.0-alpha -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>


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

</html>
