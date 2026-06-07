<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/tes', function () {
//     return view('tes');
// });
// Route::get('/hal2', function () {
//     return view('halaman2');
// });

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// High privilege routes
Route::middleware(['auth', 'role:admin,owner'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('distributor', DistributorController::class);
    Route::resource('products', ProductController::class);
    Route::resource('purchase', PurchaseController::class);
});
Route::post('purchase/validate-password', [PurchaseController::class, 'validatePassword'])->name('purchase.validatePassword');
Route::resource('sale', SaleController::class);
Route::resource('user', UserController::class)->middleware('auth');
