<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

// Kost
Route::get('/', [KosController::class, 'index'])->name('home');
Route::get('/tentang-kami', [AboutController::class, 'about']);
Route::get('/kontak', [ContactController::class, 'index']);
Route::get('/tambah-kos', [KosController::class, 'create'])->name('addKos')->middleware(Authenticate::class);
Route::post('/tambah-kos', [KosController::class, 'store'])->name('storeKos');
Route::get('/search', [KosController::class, 'search'])->name('search');
Route::get('/route/{id}', [KosController::class, 'showRoute'])->name('route');
Route::get('/route/{id}/editKos', [KosController::class, 'edit'])->name('editKos')->middleware(Authenticate::class);
Route::put('/route/{id}', [KosController::class, 'update'])->name('updateKos');
Route::delete('/route/{id}', [KosController::class, 'destroy'])->name('destroyKos')->middleware(Authenticate::class);
Route::get('/kost', [KosController::class, 'showAll'])->middleware(Authenticate::class);
Route::get('/semua-kos', [KosController::class, 'all'])->name('all');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware(RedirectIfAuthenticated::class);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Register

