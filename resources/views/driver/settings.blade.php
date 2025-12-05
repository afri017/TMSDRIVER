@extends('layouts.home')

@section('title', 'Setting - MTI Driver')

@section('content')

<!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <h3>Setting</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- profile section starts -->
    <section class="setting-section">
        <div class="custom-container">
            <div class="profile-section white-background rounded-2 p-3">
                <div class="flex-align-center gap-2">
                    <div class="profile-image m-0">
                        <img class="img-fluid profile-pic" src="{{ asset('images/profile/p8.png') }}" alt="p8">
                    </div>
                    <div class="profile-content">
                        <h3 class="profile-name">Jonathan Higgins</h3>
                        <h6 class="fw-normal content-color mt-1">jonathan01@gmail.com</h6>
                    </div>
                </div>
                <div class="wallet-part">
                    <h6>My Wallet Balance</h6>
                    <h5>$1,568.23 </h5>

                </div>
            </div>
        </div>


        <div class="custom-container">
            <h4 class="fw-medium title-color text-capitalize mt-4 mb-2">General</h4>
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="profile-setting.html" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="user-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Profile settings</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="wallet.html" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="location"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>My wallet </h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="offer.html" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="ticket-1"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Offer list</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="app-setting.html" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="password-check"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>App setting </h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>

            <h4 class="fw-medium title-color text-capitalize mt-4 mb-2">Registration details</h4>
            <div class="profile-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="driver-registration-document.html" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="document-upload"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Document registration</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        <a href="driver-vehicle-details.html" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="car"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Vehicle registration</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="driver-bank-registration-details.html" class="setting-box">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="bank"> </i>
                            </div>
                            <div class="setting-content">
                                <h5>Bank details</h5>
                                <i class="iconsax icon" data-icon="chevron-right"> </i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <h4 class="fw-medium error-color text-capitalize mt-4 mb-2">Alert zone</h4>
            <div class="profile-list alert-list">
                <ul class="setting-listing">
                    <li class="w-100">
                        <a href="#delete" class="setting-box" data-bs-toggle="modal">
                            <div class="setting-icon">
                                <i class="iconsax icon" data-icon="user-2-remove"> </i>
                            </div>
                            <div class="setting-content">
                                <h5 class="error-color">Delete account</h5>
                            </div>
                        </a>
                    </li>

                    <li class="w-100">
                        @auth
                        <form action="{{ route('logout') }}" method="POST" id="sidebar-logout-form">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();" class="setting-box" data-bs-toggle="modal">
                                <div class="setting-icon">
                                    <i class="iconsax icon" data-icon="logout-2"> </i>
                                </div>
                                <div class="setting-content">
                                    <h5 class="error-color">Logout</h5>
                                </div>
                            </a>
                        </form>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- profile section starts -->

@endsection

@push('scripts')
@endpush