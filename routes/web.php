<?php

use App\Livewire\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\ProfileViewController;

// home
Route::get('/', [DashboardController::class, 'home'])->name('home');
Route::get('/search', [DashboardController::class, 'search'])->name('search');
Route::get('/explore', [DashboardController::class, 'explore'])->name('explore');
Route::get('/topAuthor', [DashboardController::class, 'topAuthor'])->name('topAuthor');
// view post
Route::get('post/show/{slug}', [PostController::class, 'show'])->name('post.show');


// profile view
Route::get('id/{username}', [ProfileViewController::class, 'profileView'])->name('profile');
Route::get('id/{username}/likes', [ProfileViewController::class, 'likesView'])->name('profile.likes');
Route::get('id/{username}/comments', [ProfileViewController::class, 'commentsView'])->name('profile.comments');
Route::get('id/{username}/following', [ProfileViewController::class, 'followingView'])->name('profile.following');
Route::get('id/{username}/followers', [ProfileViewController::class, 'followersView'])->name('profile.followers');
Route::get('id/{username}/posts', [ProfileViewController::class, 'postsView'])->name('profile.posts');

// login and register
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
    Route::get('/id/{username}/edit/deleteProfilePicture', [ProfileEditController::class, 'deleteProfilePicture'])->name('delete.profile.picture');
    Route::post('/id/{username}/edit/deleteAccount', [ProfileEditController::class, 'deleteAccount'])->name('delete.account.submit');

    // post
    Route::get('post/new', [PostController::class, 'new'])->name('post.new');
    Route::post('post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('post/{slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('post/{slug}/submit', [PostController::class, 'update'])->name('post.update');
    Route::get('post/{slug}/delete', [PostController::class, 'delete'])->name('post.delete');

    // like
    Route::post('/like', [LikeController::class, 'toggleLike'])->name('like.toggle');
    Route::post('/follow', [FollowController::class, 'toggleFollow'])->name('follow.toggle');

    // messages
    Route::get('/messages', [MessageController::class, 'view'])->name('messages');
    Route::get('/messaging/with/{username}', [MessageController::class, 'messagingWith'])->name('messaging.with');
    Route::get('/messages/fetch/{username}', [MessageController::class, 'fetchMessages'])->name('messages.fetch');
    Route::post('/messages/send', [MessageController::class, 'sendMessage'])->name('messages.send');
});
// comment
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/comments/{post}', [CommentController::class, 'index'])->name('comments.index');

Route::get('/test', function () {
    return view('test');
})->name('test');
