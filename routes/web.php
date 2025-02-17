<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/ppdb', [PublicController::class, 'ppdb'])->name('ppdb');
// Profile
Route::get('/sambutan', [PublicController::class, 'sambutan'])->name('sambutan');
Route::get('/guru-staff', [PublicController::class, 'guru_staff'])->name('guru-staff');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');
// Publikasi
Route::get('/agenda', [PublicController::class, 'agenda'])->name('agenda');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/galery', [PublicController::class, 'galery'])->name('galery');
