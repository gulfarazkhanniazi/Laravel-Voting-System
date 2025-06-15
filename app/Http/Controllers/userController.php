<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|min:3',
            'cnic' => 'required|numeric|digits:13|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'role' => 'user',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'cnic' => $validated['cnic'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        
        // Return a response
        return redirect('/')->with('success', 'Registered & logged in!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('login_error', 'Invalid credentials')->withInput();
        }

        Auth::login($user);
        return redirect('/')->with('success', 'Login successful');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user
        $request->session()->invalidate();       // Clears session data
        $request->session()->regenerateToken();  // Prevents CSRF issues

        return redirect('/login');
    }
}
