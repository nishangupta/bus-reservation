<?php

use App\Http\Controllers\BusController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [BusController::class, 'users'])->name('users.index');

Route::get('/index', function () {
    return view('users');
});
