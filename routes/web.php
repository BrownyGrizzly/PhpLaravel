<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

// Route cho trang chính
Route::get('/', function () {
    return view('welcome');
})->name('home');
// Route cho trang đăng nhập và xác thực
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'checkRole:reader'])->group(function () {
    Route::get('dashboard/reader', [DashboardController::class, 'reader'])->name('dashboard.reader');
});

Route::middleware(['auth', 'checkRole:editor'])->group(function () {
    Route::get('dashboard/editor', [DashboardController::class, 'editor'])->name('dashboard.editor');
});

Route::middleware(['auth', 'checkRole:writer'])->group(function () {
    Route::get('dashboard/writer', [DashboardController::class, 'writer'])->name('dashboard.writer');
});
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
