<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiBusController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/bus/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/my-reservations', [HomeController::class, 'myReservations'])->name('home.myReservations');
Route::get('/bus/{bus}', [HomeController::class, 'show'])->name('home.show');

Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::put('/changePassword', [AccountController::class, 'changePassword'])->name('account.changePassword');
});

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('buses', [AdminController::class, 'buses'])->name('admin.buses');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');

    Route::get('/get-all-buses', [ApiBusController::class, 'getAllBuses'])->name('bus.all');

    Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create');
    Route::post('/bus', [BusController::class, 'store'])->name('bus.store');
    Route::get('/bus/{id}/edit', [BusController::class, 'edit'])->name('bus.edit');
    Route::put('/bus/{id}', [BusController::class, 'update'])->name('bus.update');
    Route::delete('/bus,{id}', [BusController::class, 'destroy'])->name('bus.destroy');
});
