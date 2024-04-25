<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'view_login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'post_login'])->name('post_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checkadmin'])->group(function () {
    Route::get('/homeadmin', [HomeAdminController::class, 'homeadmin'])->name('homeadmin');
});

Route::middleware(['auth', 'checkuser'])->group(function () {
    Route::get('/homeuser', [HomeUserController::class, 'homeuser'])->name('homeuser');
});
