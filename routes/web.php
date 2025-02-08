<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\ProfileViewController;

// home
Route::get('/', [DashboardController::class, 'home'])->name('home');
Route::get('/search', [DashboardController::class, 'home'])->name('search');

// only guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register/submit', [AuthController::class, 'registerSubmit'])->name('register.submit');
});


// only authenticated user
Route::middleware('auth')->group(function () {
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // profile edit 
    Route::get('/id/{username}/edit', [ProfileEditController::class, 'editProfile'])->name('profile.edit');
    Route::post('/id/{username}/edit/editProfileSubmit', [ProfileEditController::class, 'editProfileSubmit'])->name('profile.edit.submit');
    Route::post('/id/{username}/edit/changePasswordSubmit', [ProfileEditController::class, 'changePasswordSubmit'])->name('change.password.submit');
    Route::post('/id/{username}/edit/changeEmailSubmit', [ProfileEditController::class, 'changeEmailSubmit'])->name('change.email.submit');
    Route::post('/id/{username}/edit/updateProfilePicture', [ProfileEditController::class, 'updateProfilePicture'])->name('update.profile.picture');
    Route::post('/id/{username}/edit/deleteAccount', [ProfileEditController::class, 'deleteAccount'])->name('delete.account.submit');

    // post
    Route::get('post/new', [PostController::class, 'view'])->name('post.new');
    Route::post('post/upload', [PostController::class, 'upload'])->name('post.upload');
    Route::post('post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('post/{slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('post/{slug}/submit', [PostController::class, 'update'])->name('post.update');
    Route::get('post/{slug}/delete', [PostController::class, 'delete'])->name('post.delete');

    // like
    Route::post('/like', [LikeController::class, 'toggleLike'])->name('like.toggle');
});


// profile view
Route::get('id/{username}', [ProfileViewController::class, 'profileView'])->name('profile');
Route::get('id/{username}/likes', [ProfileViewController::class, 'likesView'])->name('profile.likes');
Route::get('id/{username}/comments', [ProfileViewController::class, 'commentsView'])->name('profile.comments');
// view post
Route::get('post/{slug}', [PostController::class, 'show'])->name('post.show');


// ckeditor
Route::get('ckeditorinput', [CkeditorController::class, 'index']);
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
Route::post('ckeditor/create', [CkeditorController::class, 'create'])->name('ckeditor.create');
Route::get('ckeditor/show', [CkeditorController::class, 'show'])->name('ckeditor.show');
// end ckeditor