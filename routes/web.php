<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KosController;
use Illuminate\Support\Facades\Route;


Route::get('/', [KosController::class, 'index'])->name('home');
Route::get('/tentang-kami', [AboutController::class, 'about']);
Route::get('/kontak', [ContactController::class, 'index']);
Route::get('/tambah-kos', [KosController::class, 'create'])->name('addKos');
Route::any('/tambah-kos', [KosController::class, 'store'])->name('storeKos');
Route::get('/search', [KosController::class, 'search'])->name('search');
Route::get('/route/{id}', [KosController::class, 'showRoute'])->name('route');

