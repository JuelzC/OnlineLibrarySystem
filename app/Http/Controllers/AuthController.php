<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
    'email' => $request->email,
    'password' => $request->password,
    'account_approval' => 1
])) {
    $request->session()->regenerate();
    return redirect()->intended('/home');
}

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}