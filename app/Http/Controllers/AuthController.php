<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // Check if locked
        if ($user && $user->account_locked_until && now()->lessThan($user->account_locked_until)) {
            $minutes = now()->diffInMinutes($user->account_locked_until);
            throw ValidationException::withMessages([
                'email' => "Account locked. Try again in {$minutes} minutes.",
            ]);
        } // It will give several minutes for relogin.

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Cache::forget('login_attempts:' . $request->email); // Reset on success
            return redirect()->intended(route('dashboard'));
        }

        // Failed attempt
        $key = 'login_attempts:' . $request->email;
        if (!Cache::has($key)) {
            Cache::put($key, 0, 3600); // Expires in 1 hour
        }
        $attempts = Cache::increment($key);

        if ($attempts >= 3) {
            if ($user) {
                // Lock the account
                $user->update(['account_locked_until' => now()->addMinutes(15)]);
                Cache::forget($key); // Optional: clear cache to start over after lockout or keep it
            }
            throw ValidationException::withMessages([
                'email' => 'Account locked for 15 minutes due to too many failed attempts.',
            ]);
        }

        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'student_id' => $request->student_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'alumni', // Default role
        ]);

        Auth::login($user);

        return redirect(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
