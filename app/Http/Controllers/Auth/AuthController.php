<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show login page
     */
    public function showLogin()
    {
        return view('driver.login');
    }

    /**
     * Process login
     */
    public function login(Request $request)
    {
        $request->validate([
            'no_telp' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari user berdasarkan no_telp
        $user = User::where('no_telp', $request->no_telp)->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Login user
            Auth::login($user, $request->filled('remember'));

            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'Login berhasil!');
        }

        // Jika gagal, kembali dengan error
        return back()->withErrors([
            'no_telp' => 'Nomor telepon atau password salah.',
        ])->withInput($request->only('no_telp'));
    }

    /**
     * Show signup page
     */
    public function showSignup()
    {
        return view('driver.signup');
    }

    /**
     * Process signup
     */
    public function signup(Request $request)
    {
        // TODO: Implement signup logic
        return redirect()->route('otp')->with('success', 'Registration successful! Please verify OTP.');
    }

    /**
     * Show OTP verification page
     */
    public function showOtp()
    {
        return view('driver.otp');
    }

    /**
     * Verify OTP
     */
    public function verifyOtp(Request $request)
    {
        // TODO: Implement OTP verification logic
        return redirect()->route('home')->with('success', 'OTP verified successfully!');
    }

    /**
     * Resend OTP
     */
    public function resendOtp(Request $request)
    {
        // TODO: Implement resend OTP logic
        return back()->with('success', 'OTP resent successfully!');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}