<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\dashboardController as AdminDashboard;
use App\Http\Controllers\Siswa\dashboardController as SiswaDashboard;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function() {

    Route::get('/dashboard', function () {
        if (in_array(auth()->user()->role, ['admin', 'petugas'])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('siswa.dashboard');
    })->name('dashboard');




Route::middleware(['auth', 'role:admin,petugas'])->group(function() {
    Route::get('/admin/dashboard', [AdminDashboard::class, 'index'])->middleware(['auth'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:siswa'])->group(function() {
    Route::get('/siswa/dashboard', [SiswaDashboard::class, 'index'])->middleware(['auth'])->name('siswa.dashboard');
});

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
