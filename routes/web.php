<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    $users = User::all();
    return view('');
});
