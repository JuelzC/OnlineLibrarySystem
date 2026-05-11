<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function userProfile()
    {
        $user = Users::find(Auth::id());

        $bookmarks = $user
            ? $user->bookmarks()->latest()->get()
            : collect();

        return view('user-profile', compact('bookmarks'));
    }
}