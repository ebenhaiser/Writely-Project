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

        if (User::where('username', $request->username)
            ->where('id', '!=', $profile->id)
            ->exists()
        ) {
            return redirect()->route('profile.edit', $profile->username)->with('errorUsernameTaken', 'Username has already been taken');
        }

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

    public function changeEmailSubmit(Request $request, $username)
    {
        if (Auth::user()->username != $username) {
            return redirect()->back(); // Prevents unauthorized access
        }

        $profile = User::where('username', $username)->firstOrFail();

        if (!Hash::check($request->password, $profile->password)) {
            return redirect()->route('profile.edit', $profile->username)->with('errorNewEmailPassword', 'You enter wrong password, cannot change email');
        }

        if (User::where('email', $request->new_email1)
            ->where('id', '!=', $profile->id) // Pastikan bukan email user sendiri
            ->exists()
        ) {
            return redirect()->route('profile.edit', $profile->username)->with('errorNewEmailTaken', 'New email is already taken');
        }

        $profile->email = $request->new_email1;
        $profile->save();

        return redirect()->route('profile.edit', $profile->username)->with('successChangeEmail', 'Email updated successfully');
    }

    public function deleteAccount(Request $request, $username)
    {
        if (Auth::user()->username != $username) {
            return redirect()->back();
        }

        $profile = User::where('username', $username)->firstOrFail();

        if ($profile->email != $request->email || !Hash::check($request->password, $profile->password)) {
            return redirect()->route('profile.edit', $profile->username)->with('errorDeleteAccount', 'Wrong email/password, cannot delete your account');
        }

        Auth::logout();
        $profile->delete();
        return redirect()->route('home')->with('successDeleteAccount', 'Account deleted successfully');
    }

    public function updateProfilePicture(Request $request, $username)
    {

        if (Auth::user()->username != $username) {
            return redirect()->back();
        }

        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profile = User::where('username', $username)->firstOrFail();

        $file = $request->file('profile_picture');
        // $allowedExtensions = ['jpg', 'jpeg', 'png', 'jfif', 'webp'];
        $ext = $file->getClientOriginalExtension();

        // if (!in_array(strtolower($ext), $allowedExtensions)) {
        //     return redirect()->route('profile.edit', $profile->username)->with('errorProfilePicture', 'Invalid file type');
        // }
        $newImageName = $profile->id . $profile->username . '.' . $ext;

        // Simpan file ke storage/app/public/img/profilePicture
        $path = $file->storeAs('public/img/profilePicture' . $newImageName);
        // $path = $file->move(public_path('img/profilePicture'), $newImageName);

        $profile->profile_picture = $newImageName;
        $profile->save();

        return redirect()->route('profile.edit', $profile->username)->with('successProfilePicture', 'Profile picture updated successfully');
    }
}
