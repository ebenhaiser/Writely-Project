<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('index');
// });

// ckedito
Route::get('ckeditorinput', [CkeditorController::class, 'index']);
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
Route::post('ckeditor/create', [CkeditorController::class, 'create'])->name('ckeditor.create');
Route::get('ckeditor/show', [CkeditorController::class, 'show'])->name('ckeditor.show');
// end ckedito


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
    Route::get('/post/create', [PostController::class, 'createPost'])->name('create.post');
});


Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('id/{username}', [ProfileController::class, 'profileView'])->name('profile');
