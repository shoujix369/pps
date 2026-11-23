<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function() {

    Route::get('/dashboard', function () {
        if (in_array(auth()->user()->role, ['admin', 'petugas'])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('siswa.dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', function() {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('admin.dashboard');

    Route::get('/siswa/dashboard', function() {
        return view('siswa.dashboard');
    })->middleware(['auth'])->name('siswa.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
