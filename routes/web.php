<?php

use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Auteurs
    Route::get('/auteurs', [AuteurController::class, 'index'])->name('auteurs.index');
    Route::get('/auteurs/create', [AuteurController::class, 'create'])->name('auteurs.create');
    Route::post('/auteurs/store', [AuteurController::class, 'store'])->name('auteurs.store');
    Route::get('/auteurs/{id}/show', [AuteurController::class, 'show'])->name('auteurs.show');
    Route::get('/auteurs/{id}/edit', [AuteurController::class, 'edit'])->name('auteurs.edit');
    Route::put('/auteurs/{id}/update', [AuteurController::class, 'update'])->name('auteurs.update');
    Route::delete('/auteurs/{id}/delete', [AuteurController::class, 'destroy'])->name('auteurs.destroy');

    // Livres
    Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');
    Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
    Route::post('/livres/store', [LivreController::class, 'store'])->name('livres.store');
    Route::get('/livres/{id}/show', [LivreController::class, 'show'])->name('livres.show');
    Route::get('/livres/{id}/edit', [LivreController::class, 'edit'])->name('livres.edit');
    Route::put('/livres/{id}/update', [LivreController::class, 'update'])->name('livres.update');
    Route::delete('/livres/{id}/delete', [LivreController::class, 'destroy'])->name('livres.destroy');
});

require __DIR__.'/auth.php';