<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->authenticated($request, Auth::user());
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    protected function authenticated(Request $request, $user)
    {
        if (in_array($user->role, ['admin', 'owner'])) {
            return redirect('/dashboard');
        } elseif (in_array($user->role, ['courier', 'customer'])) {
            return redirect('/home');
        }

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}