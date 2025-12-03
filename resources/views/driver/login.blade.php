@extends('layouts.app')

@section('title', 'Login - Taxido Driver')

@section('content')
<!-- header start -->
<header class="section-t-space">
    <div class="custom-container">
        <div class="header-panel">
            <a href="{{ route('onboarding') }}">
                <i class="iconsax icon-btn" data-icon="arrow-left"></i>
            </a>
            <h3>Log In</h3>
        </div>
    </div>
</header>
<!-- header end -->

<!-- login section start -->
<section class="section-b-space">
    <div class="custom-container">
        <form class="auth-form" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label mb-2" for="phone">Phone Number</label>
                <div class="form-input mb-0">
                    <select class="form-control form-select" id="country-code" name="country_code">
                        <option value="+62" selected>🇮🇩 +62</option>
                        <option value="+1">🇺🇸 +1</option>
                        <option value="+44">🇬🇧 +44</option>
                        <option value="+91">🇮🇳 +91</option>
                        <option value="+86">🇨🇳 +86</option>
                        <option value="+81">🇯🇵 +81</option>
                    </select>
                </div>
                <div class="form-input mt-2">
                    <input type="tel" class="form-control" id="phone" name="phone"
                           placeholder="Enter your phone number" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label mb-2" for="password">Password</label>
                <div class="form-input">
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Enter your password" required>
                </div>
            </div>

            <button type="submit" class="btn theme-btn w-100 mt-4">Log In</button>
        </form>

        <div class="division">
            <span>OR</span>
        </div>

        <div class="social-auth">
            <button class="btn social-btn w-100 mb-3">
                <img src="{{ asset('images/svg/google.svg') }}" alt="google" class="img-fluid">
                <span>Continue with Google</span>
            </button>
            <button class="btn social-btn w-100">
                <img src="{{ asset('images/svg/apple.svg') }}" alt="apple" class="img-fluid">
                <span>Continue with Apple</span>
            </button>
        </div>

        <div class="bottom-detail text-center mt-3">
            <h4 class="content-color">Don't have an account? <a class="title-color text-decoration-underline"
                href="{{ route('signup') }}">Sign Up</a></h4>
        </div>
    </div>
</section>
<!-- login section end -->
@endsection

@push('scripts')
<script src="{{ asset('js/iconsax.js') }}"></script>
@endpush
