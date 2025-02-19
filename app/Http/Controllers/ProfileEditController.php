<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileEditController extends Controller
{
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

        // $new_username = Str::slug($request->username, '_'); // Mengubah spasi menjadi underscore
        // $new_username = strtolower($new_username); // Mengubah semua huruf menjadi lowercase
        $new_username = strtolower(preg_replace('/[^a-zA-Z0-9._]/', '', $request->username));

        if (User::where('username', $new_username)
            ->where('id', '!=', $profile->id)
            ->exists()
        ) {
            return redirect()->route('profile.edit', $profile->username)->with('errorUsernameTaken', 'Username has already been taken');
        }

        $profile->name = $request->name;
        $profile->username = $new_username;
        $profile->bio = $request->bio;
        $profile->save();

        return redirect()->route('profile.edit', $new_username)->with('successEditProfile', 'Profile updated successfully');
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
        $oldImage = public_path('img/profilePicture/' . $profile->profile_picture);
        if (file_exists($oldImage) && is_file($oldImage) && $profile->profile_picture != 'default.jpg') {
            unlink($oldImage);
        }
        // User::find($profile->id)->likes()->delete(); // Hapus semua likes dari user
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

        // Hapus gambar lama jika ada
        $oldImage = public_path('img/profilePicture/' . $profile->profile_picture);
        if (file_exists($oldImage) && is_file($oldImage) && $profile->profile_picture != 'default.jpg') {
            unlink($oldImage);
        }

        $newImageName = hash('sha256', $profile->id . $profile->username . time()) . '.' . $ext;

        // Simpan file ke storage/app/public/img/profilePicture
        // $path = $file->store('public/img/profilePicture/');
        // $path = Storage::disk('public')->putFileAs(
        //     'public/profilePicture',
        //     $file,
        //     $newImageName
        // );


        $path = $file->move(public_path('img/profilePicture'), $newImageName);

        $profile->profile_picture = $newImageName;
        $profile->save();

        return redirect()->route('profile.edit', $profile->username)->with('successProfilePicture', 'Profile picture updated successfully');
    }

    public function deleteProfilePicture(Request $request, $username)
    {
        if (Auth::user()->username != $username) {
            return redirect()->back();
        }
        $profile = User::where('username', $username)->firstOrFail();

        $oldImage = public_path('img/profilePicture/' . $profile->profile_picture);
        if (file_exists($oldImage) && is_file($oldImage) && $profile->profile_picture != 'default.jpg') {
            unlink($oldImage);
        }

        $profile->profile_picture = 'default.jpg';
        $profile->save();


        return redirect()->route('profile.edit', $profile->username)->with('deleteProfilePicture', 'Profile picture deleted successfully');
    }
}
