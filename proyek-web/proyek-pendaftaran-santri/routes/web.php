<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController; // <-- Tambahkan ini

Route::get('/', function () {
    return view('welcome');
});

// Rute Pendaftaran Santri (Publik)
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/pendaftaran/sukses', [PendaftaranController::class, 'sukses'])->name('pendaftaran.sukses');

// Rute untuk Admin yang dilindungi
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pendaftar', [AdminController::class, 'pendaftarList'])->name('pendaftar.list');
    Route::post('/pendaftar/update-status/{id}', [AdminController::class, 'updateStatus'])->name('pendaftar.updateStatus');
});

// Memuat rute otentikasi (login, dashboard santri, dll)
require __DIR__.'/auth.php';