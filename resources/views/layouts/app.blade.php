<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Taxido Driver - Transportation Management System')</title>

    <!-- PWA Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Taxido Driver">
    <meta name="theme-color" content="#199675">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/app-icon/icon-192x192.png') }}">

    <!-- Manifest -->
    <link rel="manifest" href="{{ route('manifest') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Iconsax Icon -->
    <link rel="stylesheet" href="{{ asset('css/iconsax.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper-bundle.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>

<body class="@yield('body-class')">

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

    <!-- Template Settings -->
    <script src="{{ asset('js/template-setting.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('{{ route('service-worker') }}')
                    .then((registration) => {
                        console.log('ServiceWorker registration successful');
                    })
                    .catch((err) => {
                        console.log('ServiceWorker registration failed: ', err);
                    });
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
