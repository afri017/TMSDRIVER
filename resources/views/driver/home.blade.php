@extends('layouts.app')

@section('title', 'Dashboard - Taxido Driver')

@section('content')
<!-- header start -->
<header class="section-t-space">
    <div class="custom-container">
        <div class="header-panel">
            <img src="{{ asset('images/logo/driver/driver-logo.png') }}" class="img-fluid logo" alt="logo">
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('notifications') }}">
                    <i class="iconsax icon-btn" data-icon="notification-2"></i>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

<!-- dashboard section start -->
<section class="section-b-space">
    <div class="custom-container">
        <!-- Earnings Overview -->
        <div class="earnings-box">
            <div class="earnings-header">
                <h3>Your Earnings</h3>
                <h2 class="fw-bold">$3,100.00</h2>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <div class="stat-box text-center">
                        <h4 class="fw-bold text-success">16</h4>
                        <p class="content-color">Complete</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat-box text-center">
                        <h4 class="fw-bold text-warning">02</h4>
                        <p class="content-color">Pending</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat-box text-center">
                        <h4 class="fw-bold text-danger">04</h4>
                        <p class="content-color">Cancelled</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-4">
            <h4 class="fw-semibold mb-3">Quick Actions</h4>
            <div class="row g-3">
                <div class="col-6">
                    <a href="{{ route('ride.active') }}" class="btn btn-outline-primary w-100">
                        <i class="iconsax mb-2" data-icon="car"></i>
                        <div>Active Rides</div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{ route('ride.my') }}" class="btn btn-outline-primary w-100">
                        <i class="iconsax mb-2" data-icon="clock"></i>
                        <div>My Rides</div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{ route('wallet.index') }}" class="btn btn-outline-success w-100">
                        <i class="iconsax mb-2" data-icon="wallet"></i>
                        <div>Wallet</div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{ route('profile.settings') }}" class="btn btn-outline-secondary w-100">
                        <i class="iconsax mb-2" data-icon="setting"></i>
                        <div>Settings</div>
                    </a>
                </div>
            </div>
        </div>

        <!-- PWA Info -->
        <div class="alert alert-info mt-4">
            <h5 class="alert-heading">🚀 Laravel 11 + PWA</h5>
            <p class="mb-0">Aplikasi berhasil dikonversi ke Laravel 11 dengan Progressive Web App support!</p>
            <hr>
            <ul class="mb-0">
                <li>✅ Database schema ready (10 tables)</li>
                <li>✅ Full routing system (58 routes)</li>
                <li>✅ PWA enabled (offline support)</li>
                <li>✅ Service Worker active</li>
            </ul>
        </div>
    </div>
</section>
<!-- dashboard section end -->

<!-- Bottom Navigation -->
<div class="navbar-menu">
    <ul>
        <li class="active">
            <a href="{{ route('home') }}">
                <div class="icon">
                    <i class="iconsax icon" data-icon="home-1"></i>
                </div>
                <span class="menu-name">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('ride.active') }}">
                <div class="icon">
                    <i class="iconsax icon" data-icon="car"></i>
                </div>
                <span class="menu-name">Active Ride</span>
            </a>
        </li>
        <li>
            <a href="{{ route('ride.my') }}">
                <div class="icon">
                    <i class="iconsax icon" data-icon="note"></i>
                </div>
                <span class="menu-name">My Rides</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile.settings') }}">
                <div class="icon">
                    <i class="iconsax icon" data-icon="setting-2"></i>
                </div>
                <span class="menu-name">Settings</span>
            </a>
        </li>
    </ul>
</div>
<!-- Bottom Navigation end -->
@endsection

@push('scripts')
<script src="{{ asset('js/iconsax.js') }}"></script>
@endpush
