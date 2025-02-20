<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        // Register
        $user = User::create($fields);

        // Login
        Auth::login($user);

        // // Verify email
        // event(new Registered($user));

        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:3',
        ]);

        // Try to login
        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended();
        } else {
            return back()->withErrors([
                'error' => 'The provided credentials are incorrect.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
