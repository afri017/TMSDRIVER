<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // TODO: Implement login logic with OTP
        return redirect()->route('home')->with('success', 'Login successful!');
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
        // TODO: Implement logout logic
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
