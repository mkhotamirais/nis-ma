<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

        // Verify email
        event(new Registered($user));

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
            // return redirect()->intended();
            return redirect()->route('dashboard');
        } else {
            return back()->with('failed', 'The provided credentials are incorrect.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function users()
    {
        $users = User::orderByRaw("FIELD(role, 'admin', 'editor', 'user')")
            ->paginate(10);
        return view('admin.auth.users', compact('users'));
    }

    public function changeRole(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'user' => 'required|exists:users,id',
            'role' => 'required|in:user,editor,admin',
        ]);

        $user = User::findOrFail($fields['user']);

        $user->email === "mkhotamirais@gmail.com"
            ? $user->role = "admin"
            : $user->role = $fields['role'];

        $user->save();

        return redirect('/users')->with('success', "$user->name role berhasil di-update");
    }

    public function verifyNotice()
    {
        return view('admin.auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard');
    }

    public function resendVerifyEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
