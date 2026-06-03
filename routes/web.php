<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SerealController;
use App\Http\Controllers\RankingController;

// ===== PUBLIC ROUTES (Guest/Customer) =====
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/kriteria-info', function () {
    return view('kriteria-info');
})->name('kriteria-info');

Route::get('/ranking', [RankingController::class, 'index'])->name('ranking');

// View-only routes for Kriteria & Sereal (public)
Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
Route::get('/sereal', [SerealController::class, 'index'])->name('sereal.index');

// ===== ADMIN ROUTES (Requires Login + role=admin) =====
Route::middleware(['auth', 'admin'])->group(function () {
    // Manage Kriteria (CUD only — index is public above)
    Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/kriteria/{kriterium}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/{kriterium}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/{kriterium}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

    // Manage Sereal (CUD only — index is public above)
    Route::get('/sereal/create', [SerealController::class, 'create'])->name('sereal.create');
    Route::post('/sereal', [SerealController::class, 'store'])->name('sereal.store');
    Route::get('/sereal/{sereal}/edit', [SerealController::class, 'edit'])->name('sereal.edit');
    Route::put('/sereal/{sereal}', [SerealController::class, 'update'])->name('sereal.update');
    Route::delete('/sereal/{sereal}', [SerealController::class, 'destroy'])->name('sereal.destroy');
});

// Profile (any authenticated user)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
