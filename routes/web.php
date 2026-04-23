<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [MenuController::class, 'delete'])->name('menu.delete');

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');
Route::delete('/order/{id}', [OrderController::class, 'delete'])->name('order.delete');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/{id}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
Route::put('/payment/{id}', [PaymentController::class, 'update'])->name('payment.update');
Route::delete('/payment/{id}', [PaymentController::class, 'delete'])->name('payment.delete');

require __DIR__.'/auth.php';
