<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if (User::where('username', $request->username)->exists()) {
            return redirect()->route('register')->with(['error' => 'Username has been taken']);
        }

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
