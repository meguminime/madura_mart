<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/halaman2', function () {
    return view('hal2');
});
Route::get('/halaman3', function () {
    return view('hal3');
});

Route::resource('dashboard', DashboardController::class);
Route::resource('distributor', DistributorController::class);
Route::delete('/distributor/{id}', [DistributorController::class, 'destroy'])
    ->name('distributor.destroy');
Route::resource('products', ProductController::class);
Route::resource('purchases', PurchaseController::class);