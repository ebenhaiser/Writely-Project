<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register/submit', [AuthController::class, 'registerSubmit'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [DashboardController::class, 'home'])->name('home');
