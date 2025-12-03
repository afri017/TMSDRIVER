<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Driver\DocumentController;
use App\Http\Controllers\Driver\VehicleController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Ride\RideController;
use App\Http\Controllers\Wallet\WalletController;
use Illuminate\Support\Facades\Route;

// ===== PUBLIC ROUTES (Guest Only) =====

// Onboarding & Landing
Route::get('/', function () {
    return view('driver.index');
})->name('onboarding');

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Registration
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup']);

    // OTP Verification
    Route::get('/otp', [AuthController::class, 'showOtp'])->name('otp');
    Route::post('/otp/verify', [AuthController::class, 'verifyOtp'])->name('otp.verify');
    Route::post('/otp/resend', [AuthController::class, 'resendOtp'])->name('otp.resend');
});

// ===== PROTECTED ROUTES (Authenticated Drivers Only) =====

Route::middleware('auth:driver')->group(function () {

    // ===== DRIVER REGISTRATION FLOW =====
    Route::prefix('driver')->name('driver.')->group(function () {
        // Document Verification
        Route::get('/document-verify', [DocumentController::class, 'index'])->name('document.index');
        Route::post('/document-upload', [DocumentController::class, 'upload'])->name('document.upload');
        Route::get('/document-registration', [DocumentController::class, 'show'])->name('document.show');

        // Vehicle Registration
        Route::get('/vehicle-registration', [VehicleController::class, 'create'])->name('vehicle.create');
        Route::post('/vehicle-registration', [VehicleController::class, 'store'])->name('vehicle.store');
        Route::get('/vehicle-details', [VehicleController::class, 'show'])->name('vehicle.show');

        // Bank Details
        Route::get('/bank-details', [ProfileController::class, 'showBankDetails'])->name('bank.show');
        Route::post('/bank-details', [ProfileController::class, 'storeBankDetails'])->name('bank.store');
        Route::get('/bank-registration-details', [ProfileController::class, 'showBankRegistration'])->name('bank.registration');
    });

    // ===== DASHBOARD / HOME =====
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ===== RIDE MANAGEMENT =====
    Route::prefix('ride')->name('ride.')->group(function () {
        // Accept Ride Flow
        Route::get('/accept/{ride}', [RideController::class, 'showAccept'])->name('accept');
        Route::post('/accept/{ride}', [RideController::class, 'accept'])->name('accept.store');
        Route::get('/accept/{ride}/details', [RideController::class, 'acceptDetails'])->name('accept.details');
        Route::get('/accept/{ride}/confirmed', [RideController::class, 'confirmed'])->name('confirmed');

        // Active Rides
        Route::get('/active', [RideController::class, 'active'])->name('active');
        Route::get('/verification/{ride}', [RideController::class, 'verification'])->name('verification');
        Route::post('/verify-otp/{ride}', [RideController::class, 'verifyOtp'])->name('verify.otp');

        // On-going Ride
        Route::get('/on-way/{ride}', [RideController::class, 'onWay'])->name('onway');
        Route::post('/complete/{ride}', [RideController::class, 'complete'])->name('complete');

        // My Rides (History)
        Route::get('/my-rides', [RideController::class, 'myRides'])->name('my');
        Route::get('/pending/{ride}', [RideController::class, 'pendingDetails'])->name('pending.details');
        Route::get('/complete/{ride}', [RideController::class, 'completeDetails'])->name('complete.details');
        Route::get('/cancel/{ride}', [RideController::class, 'cancelDetails'])->name('cancel.details');

        // Ride Details
        Route::get('/{ride}/details', [RideController::class, 'details'])->name('details');
        Route::post('/{ride}/cancel', [RideController::class, 'cancel'])->name('cancel');
        Route::post('/{ride}/rate', [RideController::class, 'rate'])->name('rate');
    });

    // ===== WALLET MANAGEMENT =====
    Route::prefix('wallet')->name('wallet.')->group(function () {
        Route::get('/', [WalletController::class, 'index'])->name('index');
        Route::get('/topup', [WalletController::class, 'topup'])->name('topup');
        Route::post('/topup', [WalletController::class, 'processTopup'])->name('topup.process');
        Route::get('/withdraw', [WalletController::class, 'withdraw'])->name('withdraw');
        Route::post('/withdraw', [WalletController::class, 'processWithdraw'])->name('withdraw.process');
        Route::get('/transactions', [WalletController::class, 'transactions'])->name('transactions');
    });

    // ===== OFFERS & PROMOTIONS =====
    Route::prefix('offer')->name('offer.')->group(function () {
        Route::get('/', [ProfileController::class, 'offers'])->name('index');
        Route::get('/edit/{offer}', [ProfileController::class, 'editOffer'])->name('edit');
        Route::post('/update/{offer}', [ProfileController::class, 'updateOffer'])->name('update');
        Route::post('/toggle/{offer}', [ProfileController::class, 'toggleOffer'])->name('toggle');
    });

    // ===== PROFILE & SETTINGS =====
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
        Route::get('/profile-setting', [ProfileController::class, 'profileSetting'])->name('setting');
        Route::post('/profile-update', [ProfileController::class, 'updateProfile'])->name('update');
        Route::get('/app-setting', [ProfileController::class, 'appSetting'])->name('app.setting');
        Route::post('/app-setting', [ProfileController::class, 'updateAppSetting'])->name('app.update');
    });

    // ===== COMMUNICATION =====
    Route::prefix('chat')->name('chat.')->group(function () {
        Route::get('/{ride}', [RideController::class, 'chat'])->name('show');
        Route::post('/{ride}/send', [RideController::class, 'sendMessage'])->name('send');
    });

    // ===== NOTIFICATIONS =====
    Route::get('/notifications', [DashboardController::class, 'notifications'])->name('notifications');
    Route::post('/notifications/{notification}/read', [DashboardController::class, 'markAsRead'])->name('notifications.read');
});

// ===== PWA ROUTES =====
Route::get('/manifest.json', function () {
    return response()->json([
        'name' => 'Taxido Driver',
        'short_name' => 'Taxido',
        'start_url' => '/',
        'display' => 'standalone',
        'background_color' => '#ffffff',
        'theme_color' => '#199675',
        'icons' => [
            [
                'src' => '/images/app-icon/icon-40x40.png',
                'sizes' => '40x40',
                'type' => 'image/png'
            ],
            [
                'src' => '/images/app-icon/icon-72x72.png',
                'sizes' => '72x72',
                'type' => 'image/png'
            ],
            [
                'src' => '/images/app-icon/icon-96x96.png',
                'sizes' => '96x96',
                'type' => 'image/png'
            ],
            [
                'src' => '/images/app-icon/icon-128x128.png',
                'sizes' => '128x128',
                'type' => 'image/png'
            ],
            [
                'src' => '/images/app-icon/icon-144x144.png',
                'sizes' => '144x144',
                'type' => 'image/png'
            ],
            [
                'src' => '/images/app-icon/icon-152x152.png',
                'sizes' => '152x152',
                'type' => 'image/png'
            ],
            [
                'src' => '/images/app-icon/icon-192x192.png',
                'sizes' => '192x192',
                'type' => 'image/png'
            ],
            [
                'src' => '/images/app-icon/icon-384x384.png',
                'sizes' => '384x384',
                'type' => 'image/png'
            ],
            [
                'src' => '/images/app-icon/icon-512x512.png',
                'sizes' => '512x512',
                'type' => 'image/png'
            ],
        ]
    ]);
})->name('manifest');

Route::get('/service-worker.js', function () {
    return response()->file(public_path('service-worker.js'), [
        'Content-Type' => 'application/javascript',
    ]);
})->name('service-worker');
