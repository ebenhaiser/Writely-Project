<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register/submit', [AuthController::class, 'registerSubmit'])->name('register.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/id/{username}/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::post('/id/{username}/edit/editProfileSubmit', [ProfileController::class, 'editProfileSubmit'])->name('profile.edit.submit');
    Route::post('/id/{username}/edit/changePasswordSubmit', [ProfileController::class, 'changePasswordSubmit'])->name('change.password.submit');
    Route::post('/id/{username}/edit/changeEmailSubmit', [ProfileController::class, 'changeEmailSubmit'])->name('change.email.submit');
    Route::post('/id/{username}/edit/updateProfilePicture', [ProfileController::class, 'updateProfilePicture'])->name('update.profile.picture');
    Route::post('/id/{username}/edit/deleteAccount', [ProfileController::class, 'deleteAccount'])->name('delete.account.submit');
});


Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('id/{username}', [ProfileController::class, 'profileView'])->name('profile');
