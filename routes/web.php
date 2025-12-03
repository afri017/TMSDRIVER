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


Route::get('/', [DashboardController::class, 'index'])->name('home');

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
