<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [BusController::class, 'users'])->name('users.index');

Route::get('/index', function () {
    return view('users');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('buses', [AdminController::class, 'buses'])->name('admin.buses');

    Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create');
});
