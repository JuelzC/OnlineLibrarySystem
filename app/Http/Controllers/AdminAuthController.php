<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin_login');
    }

    public function showSignup()
    {
        return view('admin_signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'date_of_birth' => 'required',
            'password' => 'required|min:6'
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'password' => Hash::make($request->password),
            'account_approval' => 0
        ]);

        return redirect()->route('admin.login')
            ->with('success', 'Admin account created!');
    }
}