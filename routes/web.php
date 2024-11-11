<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});

// Route untuk melihat daftar pegawai
Route::resource('employees', EmployeeController::class);

Route::get('/employees/print', [EmployeeController::class, 'print'])->name('employees.print');
