<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginLog;

class AuthController extends Controller
{
    // Display the login form
    public function showLogin()
    {
        return view('login');
    }

    // Process the login request
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in using the provided credentials
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation
            $request->session()->regenerate();

            // Log the successful login
            LoginLog::create([
                'user_id' => Auth::id(),
                'ip' => $request->ip(),
                'status' => 'success',
            ]);

            // Redirect to the dashboard
            return redirect('/dashboard');
        }

        // Log the failed login attempt (no user ID)
        LoginLog::create([
            'user_id' => null,
            'ip' => $request->ip(),
            'status' => 'failed',
        ]);

        // Redirect back with an error message
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput($request->only('email'));
    }

    // Log the user out and invalidate the session
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
