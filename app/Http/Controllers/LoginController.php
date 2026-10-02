<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Process login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $key = Str::lower($request->email) . '|' . $request->ip();

        // Allow 3 failed attempts
        if (RateLimiter::tooManyAttempts($key, 3)) {

            $seconds = RateLimiter::availableIn($key);

            return back()
                ->withInput($request->only('email'))
                ->with(
                    'error',
                    "Too many login attempts. Please try again in {$seconds} seconds."
                );
        }

        // Attempt login
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            // Clear failed attempts after successful login
            RateLimiter::clear($key);

            // Regenerate session
            $request->session()->regenerate();


            if(Auth::user()->role == 'admin') {

               return redirect()->route('admin.home');
            }
            if(Auth::user()->role == 'employee'){
                return redirect()->route('employee.index');
            }

        }

        // Record failed attempt for 60 seconds
        RateLimiter::hit($key, 60);

        return back()
            ->withInput($request->only('email'))
            ->with(
                'error',
                'Invalid email or password.'
            );
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
