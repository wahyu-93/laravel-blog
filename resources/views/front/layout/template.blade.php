<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('front/css/styles.css')}}" rel="stylesheet" />
        <link href="{{ asset('front/css/custom.css')}}" rel="stylesheet" />

        {{-- aos --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('front.layout._navigation')

        <!-- Page header with logo and tagline-->
        @include('front.layout._header')

        <!-- Page content-->
        @yield('content')

        <!-- Footer-->
        @include('front.layout._footer')
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('front/js/scripts.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            AOS.init();
        </script>
        @stack('js')
    </body>
</html>