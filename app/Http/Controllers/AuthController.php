<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Invalid email or password');
        }
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        // Buat username dari name (spasi -> underscore dan menjadi lowercase)
        $username = Str::slug($request->name, '_'); // Mengubah spasi menjadi underscore
        $username = strtolower($username); // Mengubah semua huruf menjadi lowercase


        // Cek apakah username sudah ada di database
        $originalUsername = $username;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $originalUsername . '_' . $counter;
            $counter++;
        }

        // Simpan user baru
        $user = new User();
        $user->name = $request->name;
        $user->username = $username; // Username dengan format unik
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('register')->with(['error' => 'Email has been taken']);
        }

        $user->save();
        return redirect()->route('login')->with('success', 'Your registration has been successful');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
