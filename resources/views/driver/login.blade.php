@extends('layouts.home')

@section('title', 'Login - MTI Driver')

@section('content')

    <!-- header starts -->
    <header id="header" class="auth-header">
        <div class="custom-container">
            <div class="header-panel  pb-0">
                <img class="img-fluid mx-auto logo" src="{{ asset('images/logo/driver/driver-logo.png') }}" alt="logo">
                <img class="img-fluid mx-auto logo-dark" src="{{ asset('images/logo/driver/driver-logo-dark.png') }}"
                    alt="logo">
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- login page start -->
    <div class="auth-bg-image-box">
        <div class="auth-bg-image"></div>
        <div class="auth-content-bg auth-content-bg-bottom">
            <div class="custom-container white-background pb-2">
                <div class="auth-title mt-0">
                    <div class="loader-line"></div>
                    <h2>Let’s Log in</h2>
                    <h6>Hey, You have been missed !</h6>
                </div>

                <form class="auth-form" method="POST" action="{{ route('login.post') }}">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group mt-0">
                        <label class="form-label" for="no_telp">Mobile Number</label>
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle mt-0" href="#" data-bs-toggle="dropdown">
                                    +62
                                    <i class="iconsax dropdown-icon" data-icon="chevron-down"> </i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">+62</a></li>
                                </ul>
                            </div>
                            <div class="form-group position-relative mt-0 w-100">
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                    id="no_telp" name="no_telp" value="{{ old('no_telp') }}"
                                    placeholder="Enter your number" required>
                                <i class="iconsax icon" data-icon="phone"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-0">
                        <label class="form-label" for="password">Password</label>
                        <div class="d-flex gap-2">
                            <div class="form-group position-relative mt-0 w-100">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password"
                                    placeholder="Password" required>
                                <i class="iconsax icon" data-icon="key"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn theme-btn w-100 auth-btn">Login</button>
                    <!-- <h6 class="content-color fw-normal my-3 text-center"> New User ?
                        <a href="signup.html" class="title-color fw-medium">Sign up</a>
                    </h6> -->
                </form>
            </div>
        </div>
    </div>
    <!-- login page end -->
@endsection

@push('scripts')
@endpush