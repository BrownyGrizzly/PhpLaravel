<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Phương thức hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Phương thức xử lý việc đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->role;

            if ($role === 'reader') {
                return redirect()->route('dashboard.reader');
            } elseif ($role === 'editor') {
                return redirect()->route('dashboard.editor');
            } elseif ($role === 'writer') {
                return redirect()->route('dashboard.writer');
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
        }
    }

    // Phương thức đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
