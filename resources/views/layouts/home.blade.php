<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MTI DRIVER">
    <meta name="keywords" content="MTI DRIVER">
    <meta name="author" content="MTI DRIVER">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="{{ asset('images/logo/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title', 'MTI DRIVER - Transportation Management System')</title>
    <link rel="apple-touch-icon" href="{{ asset('images/logo/favicon.ico') }}">
    <meta name="title-color" content="#1F1F1F">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="MTI DRIVER">
    <meta name="msapplication-TileImage" content="{{ asset('images/logo/favicon.ico') }}">

    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    
    <!-- PWA Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="MTI Driver">
    <meta name="theme-color" content="#199675">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo/favicon.ico') }}">
    
    <!--Google font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/GTWalsheimPro.css') }}">
    
    <!-- Iconsax Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/iconsax.css') }}">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/swiper-bundle.min.css') }}">
    
    <!-- Bootstrap CSS -->
    <link id="rtl-link"
      rel="stylesheet"
      href="{{ asset('css/vendors/bootstrap.css') }}"
      data-ltr="{{ asset('css/vendors/bootstrap.css') }}"
      data-rtl="{{ asset('css/vendors/bootstrap.rtl.min.css') }}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" id="change-link" type="text/css" href="{{ asset('css/style.css') }}">
    
    <!-- Manifest -->
    <link rel="manifest" href="{{ route('manifest') }}">
    @stack('styles')
</head>

<body class="@yield('body-class')">


    @yield('content')   

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    <div class="navbar-menu" {{ request()->routeIs('login') ? 'Hidden' : '' }}>
        <ul>
            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <div class="icon">
                        <img class="unactive" src="{{ asset('images/svg/home.svg') }}" alt="home">
                        <img class="active" src="{{ asset('images/svg/home-fill.svg') }}" alt="home">
                    </div>
                    <span class="active">Home</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('driver.active-ride') ? 'active' : '' }}">
                <a href="{{ route('driver.active-ride') }}">
                    <div class="icon">
                        <img class="unactive" src="{{ asset('images/svg/driving.svg') }}" alt="driving">
                        <img class="active" src="{{ asset('images/svg/driving-fill.svg') }}" alt="driving">
                    </div>
                    <span>Active Ride</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('driver.my-ride') ? 'active' : '' }}">
                <a href="{{ route('driver.my-ride') }}">
                    <div class="icon">
                        <img class="unactive" src="{{ asset('images/svg/car.svg') }}" alt="car">
                        <img class="active" src="{{ asset('images/svg/car-fill.svg') }}" alt="car">
                    </div>
                    <span>My Rides</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('driver.setting') ? 'active' : '' }}">
                <a href="{{ route('driver.setting') }}">
                    <div class="icon">
                        <img class="unactive" src="{{ asset('images/svg/setting.svg') }}" alt="setting">
                        <img class="active" src="{{ asset('images/svg/setting-fill.svg') }}" alt="setting">
                    </div>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- bottom navbar end -->

    <!-- sidebar starts -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header sidebar-header">
            <div class="sidebar-logo">
                <img class="img-fluid logo" src="{{ asset('images/logo/driver/driver-logo.png') }}" alt="logo">
                <img class="img-fluid logo-dark" src="{{ asset('images/logo/driver/driver-logo-dark.png') }}" alt="logo">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        </div>
        <div class="offcanvas-body">
            <a href="profile-setting.html" class="profile-part flex-align-center gap-2">
                <img class="img-fluid profile-pic" src="{{ asset('images/profile/p8.png') }}" alt="p8">
                <div>
                    <h3>Jonathan Higgins</h3>
                    <span>Edit Account</span>
                </div>
            </a>
            <ul class="link-section switch-section">
                <li class="active">
                    <a href="home.html" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="home-2"> </i>
                        <h3>Home</h3>
                    </a>
                </li>
                <li>
                    <a href="my-rides.html" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="car"> </i>
                        <h3>My Ride</h3>
                    </a>
                </li>
                <li>
                    <a href="notification.html" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="bell-2"> </i>
                        <h3>Notification</h3>
                    </a>
                </li>

                <li>
                    <a href="setting.html" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="user-1"> </i>
                        <h3>Setting</h3>
                    </a>
                </li>
                <li>
                    <a href="page-listing.html" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="book-closed"> </i>
                        <h3>Template Pages</h3>
                    </a>
                </li>

                <li>
                    <a href="../elements/elements-page.html" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="document-text-1"> </i>
                        <h3> Template Elements</h3>
                    </a>
                </li>


                <li>
                    <div class="pages">
                        <i class="iconsax sidebar-icon" data-icon="repeat"> </i>
                        <h3>RTL</h3>
                    </div>
                    <div class="switch-btn">
                        <input id="dir-switch" type="checkbox">
                    </div>
                </li>

                <li>
                    <div class="pages">
                        <i class="iconsax sidebar-icon" data-icon="brush-3"> </i>
                        <h3>Dark</h3>
                    </div>
                    <div class="switch-btn">
                        <input id="dark-switch" type="checkbox">
                    </div>
                </li>

            </ul>

            <div class="bottom-sidebar">
                @auth
                <form action="{{ route('logout') }}" method="POST" id="sidebar-logout-form">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="logout-2"> </i>
                        <h3>Logout</h3>
                    </a>
                </form>
                @endauth
            </div>
        </div>
    </div>
    <!-- sidebar end -->

    <!-- iconsax js -->
    <script src="{{ asset('js/iconsax.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- sticky-header js -->
    <script src="{{ asset('js/sticky-header.js') }}"></script>
    
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