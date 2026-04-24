<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function userProfile()
    {
        return view('user-profile');
    }
}