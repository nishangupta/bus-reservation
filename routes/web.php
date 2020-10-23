<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiBusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/bus/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/bus/{bus}', [HomeController::class, 'show'])->name('home.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::put('/changePassword', [AccountController::class, 'changePassword'])->name('account.changePassword');

    Route::get('/my-reservations', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('/bus/applyReservation/{bus}', [ReservationController::class, 'create'])->name('reservation.create');
    Route::get('/my-reservations/{id}/destroy', [ReservationController::class, 'destroy'])->name('reservation.destroy');
    Route::get('/my-reservations-api', [ReservationController::class, 'myReservationsApi'])->name('reservation.myReservationsApi');

    //chats 
    Route::get('/chats', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chats', [ChatController::class, 'store'])->name('chat.store');
    Route::get('/get-messages', [ChatController::class, 'getMessages'])->name('chat.getMessages'); //for users
    Route::get('/get-customer-messages/{userId}', [ChatController::class, 'getCustomerMessages'])->name('chat.getCustomerMessages'); //for admins
    Route::get('/get-customer-list', [ChatController::class, 'getCustomerList'])->name('chat.customerList');
});

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('buses', [AdminController::class, 'buses'])->name('admin.buses');
    Route::get('customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('pending-request', [CustomerController::class, 'pendingRequest'])->name('customer.pendingRequest');

    //admin api routes
    Route::get('/get-all-buses', [ApiBusController::class, 'getAllBuses'])->name('bus.all');
    Route::get('/get-all-customers', [CustomerController::class, 'all'])->name('customer.all');
    Route::get('/get-all-pending-request', [CustomerController::class, 'pendingRequestApi'])->name('customer.pendingRequestApi');

    Route::get('/get-all-notifications', [AdminController::class, 'notifications'])->name('admin.notifications');

    //pending request
    Route::get('/customer-reservations/{id}/approve', [CustomerController::class, 'requestApprove'])->name('bus.requestApprove');
    Route::get('/customer-reservations/{id}/reject', [CustomerController::class, 'requestReject'])->name('bus.requestReject');

    Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create');
    Route::post('/bus', [BusController::class, 'store'])->name('bus.store');
    Route::get('/bus/{id}/edit', [BusController::class, 'edit'])->name('bus.edit');
    Route::put('/bus/{id}', [BusController::class, 'update'])->name('bus.update');
    Route::delete('/bus,{id}', [BusController::class, 'destroy'])->name('bus.destroy');
});
