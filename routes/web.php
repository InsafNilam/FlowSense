<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WaterBillController;
use App\Http\Controllers\WaterBillUnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $unit = 0;
    $cost = 0;
    return view('dashboard', compact('unit', 'cost'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Added the following routes
    Route::resource('customer', CustomerController::class)->except('create');
    Route::get('/customer/calculate', [CustomerController::class, 'calculate'])
        ->name('customer.calculate');
    Route::resource('water-bill', WaterBillController::class);
    Route::resource('water-bill-unit', WaterBillUnitController::class);
});

require __DIR__ . '/auth.php';
