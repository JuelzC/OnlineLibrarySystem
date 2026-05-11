<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminLogin extends Controller
{
    public function showLogin()
    {
        return view('/admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            $user = Auth::user();

            // Check if admin account is approved
            if ($user->role_id == 1 && !$user->account_approval)
            {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Admin account is waiting for approval.',
                ]);
            }

            return redirect()->intended('/admin/homepage');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
