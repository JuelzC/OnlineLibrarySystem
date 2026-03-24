<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class RegisterController extends Controller
{
   public function Register() {
    return view ('register');
   }

   public function accCreate(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        Users::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => '2',
            'account_approval' => '0'
        ]);
        return redirect()->route('home')->with('message', 'Account Created. Pending Approval.');
   }  

}  