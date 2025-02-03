<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function editProfileSubmit(Request $request, $username)
    {
        if (Auth::user()->username != $username) {
            return redirect()->back();
        }

        $profile = User::where('username', $username)->firstOrFail();
        $profile->name = $request->name;
        $profile->username = $request->username;
        $profile->bio = $request->bio;
        $profile->save();

        return redirect()->route('profile.edit', $profile->username)->with('successEditProfile', 'Profile updated successfully');
    }

    public function changePasswordSubmit(Request $request, $username)
    {
        if (Auth::user()->username != $username) {
            return redirect()->back();
        }

        $profile = User::where('username', $username)->firstOrFail();

        if (!Hash::check($request->old_password, $profile->password)) {
            return redirect()->route('profile.edit', $profile->username)->with('errorOldPassword', 'Old password is incorrect');
        }

        if ($request->new_password1 != $request->new_password2) {
            return redirect()->route('profile.edit', $profile->username)->with('errorNewPassword', 'New passwords do not match');
        }

        $profile->password = Hash::make($request->new_password1);
        $profile->save();

        return redirect()->route('profile.edit', $profile->username)->with('successChangePassword', 'Password updated successfully');
    }
}
