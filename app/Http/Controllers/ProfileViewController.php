<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileViewController extends Controller
{
    public function profile($username)
    {
        $profile = User::where('username', $username)->firstOrFail();
        $postCount = count($profile->posts);
        // Mengembalikan data, bukan view
        return compact('profile', 'postCount');
    }

    public function profileView($username)
    {
        // Ambil data dari profile()
        $data = $this->profile($username);

        $profile = $data['profile'];
        $postCount = $data['postCount'];
        $posts = $profile->posts;

        // Kirim data ke tampilan index
        return view('Profile.profile', compact('profile', 'postCount', 'posts'));
    }
}
