<?php

use App\Http\Controllers\KosController;

Route::get('/', [KosController::class, 'index'])->name('home');
Route::get('/tentang-kami', function () {
    return view('about');
})->name('about');
Route::get('/kontak', function () {
    return view('contact');
})->name('contact');
Route::get('/tambah-kos', [KosController::class, 'create'])->name('addKos');
Route::post('/tambah-kos', [KosController::class, 'store'])->name('storeKos');
Route::post('/search', [KosController::class, 'search'])->name('search');
Route::get('/route/{id}', [KosController::class, 'showRoute'])->name('route');

