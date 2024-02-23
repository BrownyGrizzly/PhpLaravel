<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerformanceController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/performance', [PerformanceController::class, 'index'])->name('performance.index');
Route::get('/performance/create', [PerformanceController::class, 'create'])->name('performance.create');
Route::get('/performance/{id}', [PerformanceController::class, 'show'])->name('performance.show');
Route::post('/performance', [PerformanceController::class, 'store'])->name('performance.store');
