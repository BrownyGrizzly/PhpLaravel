<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Method to display the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Method to handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if 'role' property exists
            if (isset($user->role)) {
                $role = $user->role;

                if ($role === 'reader') {
                    return redirect()->route('dashboard.reader');
                } elseif ($role === 'editor') {
                    return redirect()->route('dashboard.editor');
                } elseif ($role === 'writer') {
                    return redirect()->route('dashboard.writer');
                }
            } else {
                // Handle case where 'role' property is not found
                return redirect()->back()->withErrors(['role' => 'User role not found']);
            }
        } else {
            return redirect()->back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
        }
    }

    // Method to handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
