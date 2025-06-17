<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Patient\QueueController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/registrasi', [HomeController::class, 'create'])->name('registration');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin
Route::get('/datapasien', [PatientController::class, 'index'])->name('index');

// Patient
Route::name('patient.')->group(function () {
    Route::get('/antrian', [QueueController::class, 'index'])->name('index');
    Route::post('/antrian/ambilantrian', [QueueController::class, 'get_queue'])->name('get_queue');
    Route::get('/antrian/cetak', [QueueController::class, 'print_queue'])->name('print_queue');
});
