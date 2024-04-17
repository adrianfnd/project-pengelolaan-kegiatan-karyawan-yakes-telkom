<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelatihanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth Route
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
    Route::get('/pelatihan-create', [PelatihanController::class, 'create'])->name('pelatihan.create');
    Route::post('/pelatihan', [PelatihanController::class, 'store'])->name('pelatihan.store');
    Route::get('/pelatihan-show-{pelatihan}', [PelatihanController::class, 'show'])->name('pelatihan.show');
    Route::get('/pelatihan-edit-{pelatihan}', [PelatihanController::class, 'edit'])->name('pelatihan.edit');
    Route::put('/pelatihan-update-{pelatihan}', [PelatihanController::class, 'update'])->name('pelatihan.update');
    Route::delete('/pelatihan-delete-{pelatihan}', [PelatihanController::class, 'destroy'])->name('pelatihan.destroy');
    Route::post('/pelatihan-export-excel', [PelatihanController::class, 'exportExcel'])->name('pelatihan.export.excel');
});
