<?php

use App\Http\Controllers\KosController;


Route::get('/', [KosController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/add-kos', [KosController::class, 'create'])->name('addKos');
Route::post('/add-kos', [KosController::class, 'store'])->name('storeKos');
Route::post('/search', [KosController::class, 'search'])->name('search');
Route::get('/route/{id}', [KosController::class, 'showRoute'])->name('route');
