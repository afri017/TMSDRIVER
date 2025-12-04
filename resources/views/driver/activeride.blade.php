@extends('layouts.home')

@section('title', 'Active - MTI Driver')

@section('content')
<!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                    <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                </a>
                <h3>Active Ride</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- active ride starts -->
    <section>
        <div class="custom-container">
            <ul class="my-ride-list driver-ride-list mt-0">
                <li>
                    <div class="my-ride-box">
                        <div class="my-ride-head">
                            <a href="accept-ride-confirmed.html" class="my-ride-img">
                                <img class="img-fluid profile-img" src="{{ asset('images/profile/p5.png') }}" alt="p5">
                            </a>

                            <div class="my-ride-content flex-column">
                                <div class="flex-spacing">
                                    <a href="accept-ride-confirmed.html">
                                        <h6 class="title-color fw-medium">Peter Thornton</h6>
                                    </a>
                                    <h5 class="fw-mediun success-color">$256</h5>
                                </div>
                                <div class="flex-align-center gap-3">
                                    <div class="flex-align-center gap-1">
                                        <img class="star" src="{{ asset('images/svg/star.svg') }}" alt="star">
                                        <h5 class="fw-normal title-color">4.8</h5>
                                        <span class="content-color fw-normal">(127)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-ride-details">
                            <div class="ride-info">
                                <h6 class="fw-normal content-color">15 May’25 at 10:15 AM</h6>
                                <div class="flex-align-center gap-2">
                                    <a href="chatting.html" class="comm-icon">
                                        <img class="img-fluid icon-btn" src="{{ asset('images/svg/messages-fill.svg') }}"
                                            alt="messages">
                                    </a>
                                    <a href="tel:+4733378901" class="comm-icon">
                                        <img class="img-fluid icon-btn" src="{{ asset('images/svg/call-fill.svg') }}"
                                            alt="call">
                                    </a>
                                </div>
                            </div>
                            <ul class="ride-location-listing mt-3">
                                <li class="border-0 shadow-none">
                                    <div class="location-box">
                                        <img class="icon" src="{{ asset('images/svg/location-fill.svg') }}"
                                            alt="location">
                                        <h5 class="fw-light title-color">17, Yonge St, Toronto, Canada</h5>
                                    </div>
                                </li>

                                <li class="border-0 shadow-none">
                                    <div class="location-box">
                                        <img class="icon" src="{{ asset('images/svg/gps.svg') }}" alt="gps">
                                        <h5 class="fw-light title-color border-0">20, Yonge St, Toronto, Canada
                                        </h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a href="ride-verification.html" class="btn theme-btn w-100 mt-3">Pickup Customer</a>

                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- active ride end -->

@endsection

@push('scripts')
@endpush
