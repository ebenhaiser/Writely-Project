<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileView($username)
    {
        $profile = User::where('username', $username)->firstOrFail();
        return view('Profile.profile', compact('profile'));
    }

    public function editProfile(Request $request, $username)
    {
        if (Auth::user()->username != $username) {
            return redirect()->back();
        }
        $profile = User::where('username', $username)->firstOrFail();
        return view('Profile.edit', compact('profile'));
    }
}
