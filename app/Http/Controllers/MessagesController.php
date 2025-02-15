<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function messages()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }
        return view('messages');
    }
}
