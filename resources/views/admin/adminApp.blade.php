<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ Vite::asset('public/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ Vite::asset('public/assets/img/hehe.png') }}">
    <title>
        OniiRoom
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ Vite::asset('public/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ Vite::asset('public/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ Vite::asset('public/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ URL::asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/hehe.png') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js">
    </script>
</head>

<body class="{{ $class ?? '' }}">
    @auth
        @if (
            !in_array(request()->route()->getName(),
                ['profile', 'profile-static']))
            <div class="min-height-300 bg-primary position-absolute w-100"></div>
        @elseif (in_array(request()->route()->getName(),
                ['profile-static', 'profile']))
            <div class="position-absolute w-100 min-height-300 top-0"
                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                <span class="mask bg-primary opacity-6"></span>
            </div>
        @endif
        @include('admin.layouts.partials.sidenav')
        @include('sweetalert::alert')
        <main class="main-content border-radius-lg">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show mx-4 mb-4" role="alert"
                    x-data="{ open: true }" x-show="open">
                    {{ Session::get('message') }}
                    <button @click="open=false" type="button" class="btn-close align-middle" data-bs-dismiss="alert"
                        aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" alt="close"
                            style="width: 24px; height:24px;"></button>
                </div>
            @endif
            @yield('content')
        </main>
        @include('components.fixed-plugin')
    @endauth


    <!--   Core JS Files   -->
    <script src="{{ Vite::asset('public/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ Vite::asset('public/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/argon-dashboard.js"></script>
    @stack('js');
    {{-- @include('layouts.footers.auth.footer') --}}

</body>

</html>
