<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/ppdb', 'pages.ppdb')->name('ppdb');

// Profile
Route::get('/sambutan', [PublicController::class, 'sambutan'])->name('sambutan');
// Route::get('/guru-staff', [PublicController::class, 'guru_staff'])->name('guru-staff');
Route::view('/guru-staff', 'pages.profile.guru-staff')->name('guru-staff');
Route::view('/sejarah', 'pages.profile.sejarah')->name('sejarah');
Route::view('/visi-misi-tujuan', 'pages.profile.visi-misi-tujuan')->name('visi-misi-tujuan');

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
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
