@extends('layouts.app')

@section('title', 'Taxido Driver - Onboarding')

@section('body-class', 'white-background')

@section('content')
<!-- onboarding section start -->
<section class="onboarding-section">
    <div class="swiper driver-main-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="poster-image">
                    <img class="img-fluid image" src="{{ asset('images/onboarding/driver1.png') }}" alt="img1">
                    <img class="img-fluid image-dark" src="{{ asset('images/onboarding/driver1dark.png') }}" alt="img1">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="poster-image">
                    <img class="img-fluid image" src="{{ asset('images/onboarding/driver2.png') }}" alt="img2">
                    <img class="img-fluid image-dark" src="{{ asset('images/onboarding/driver2dark.png') }}" alt="img2">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="poster-image">
                    <img class="img-fluid image" src="{{ asset('images/onboarding/driver3.png') }}" alt="img3">
                    <img class="img-fluid image-dark" src="{{ asset('images/onboarding/driver3dark.png') }}" alt="img3">
                    <img class="img-fluid drivers" src="{{ asset('images/onboarding/drivers.svg') }}" alt="drivers">
                </div>
            </div>
        </div>
    </div>

    <div class="custom-container">
        <div class="bottom-box driver-bottom-box">
            <div class="reletive-slider">
                <div class="swiper driver-thumbnail-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="poster-details">
                                <h2>Choose your destination</h2>
                                <p>Simply touch and pick to have all of your products and services delivered to your door.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="poster-details">
                                <h2>Enjoy your trip</h2>
                                <p>Select a service from the list that correlates with your needs and then move forward.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="poster-details">
                                <h2>Check fare & book ride</h2>
                                <p>Choose an appropriate time and day, then reserve your service by including an address.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-pagination-box">
                <div class="swiper-pagination driver-slider-pagination"></div>
            </div>

            <a href="{{ route('login') }}" class="btn theme-btn driver-btn w-100">Get Started</a>
        </div>
    </div>
</section>
<!-- onboarding section end -->
@endsection

@push('scripts')
<script src="{{ asset('js/custom-swiper.js') }}"></script>
@endpush
