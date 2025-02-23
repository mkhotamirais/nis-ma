<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/ppdb', 'pages.ppdb')->name('ppdb');

// Profile
Route::view('/sambutan', 'pages.profile.sambutan')->name('sambutan');
Route::view('/guru-staff', 'pages.profile.guru-staff')->name('guru-staff');
Route::view('/sejarah', 'pages.profile.sejarah')->name('sejarah');
Route::view('/visi-misi-tujuan', 'pages.profile.visi-misi-tujuan')->name('visi-misi-tujuan');
Route::view('/mars-hymne', 'pages.profile.mars-hymne')->name('mars-hymne');

// Publikasi
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/galery', [PublicController::class, 'galery'])->name('galery');
Route::get('/prestasi', [PublicController::class, 'prestasi'])->name('prestasi');
Route::get('/agenda', [PublicController::class, 'agenda'])->name('agenda');
Route::resource('/news', NewsController::class);
Route::resource('/galeries', GaleryController::class);
Route::resource('/achievements', AchievementController::class);
Route::resource('/agendas', AgendaController::class);

// Auth
Route::middleware('guest')->group(function () {

    Route::view('/register', 'admin.auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'admin.auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // forgot password
    Route::view('/forgot-password', 'admin.auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});


// Route::middleware(['auth', RoleMiddleware::class . ':admin,editor,user'])->group(function () {
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    Route::patch('/me', [UserController::class, 'updateMe'])->name('update-me');

    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::get('/users', [UserController::class, 'users'])->name('users');
        Route::patch('/users', [UserController::class, 'changeRole'])->name('change-role');
        Route::delete('/users', [UserController::class, 'deleteUser'])->name('users.destroy');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/wrong-email-register', [AuthController::class, 'wrongEmailRegister'])->name('wrong-email-register');

    // email verification notice route
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');

    // email verification route
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');

    // email verification resend route
    Route::post('/email/verification-notification', [AuthController::class, 'resendVerifyEmail'])->middleware('throttle:6,1')->name('verification.send');
});

// });
