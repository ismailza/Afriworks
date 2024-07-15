<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@hasSection('meta_description') @yield('meta_description') @else {{ setting('site.description') }} @endif">
    <meta name="keywords" content="@hasSection('meta_keywords') @yield('meta_keywords') @else {{ setting('site.keywords') }} @endif">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/'. setting('site.favicon')) }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawsome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawsome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Preloader -->
    <x-preloader />

    <!-- Header -->
    @include('partials.header')

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Whatsapp chat -->
    <a href="https://wa.me/{{ setting('contact.whatsapp') }}" class="whatsapp-btn" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- scroll top part start -->
    <button class="scroll-to-top">
        <i class="fas fa-angle-up"></i>
    </button>

    <!-- Footer -->
    @include('partials.footer')

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
