<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route::get('/', [DashboardController::class, 'home'])->name('home');