<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

use App\Http\Controllers\EventController;

Route::post('/events', [EventController::class, 'store'])->name('events.store');

use App\Models\Event;

Route::get('/', function () {
    $events = Event::orderBy('main_event_datetime', 'asc')->get();
    return view('welcome', compact('events'));
})->name('welcome');;



use App\Http\Controllers\PaymentController;

Route::middleware(['auth'])->group(function () {
    Route::post('/bayar', [PaymentController::class, 'show'])->name('bayar.show');
    Route::post('/bayar/proses', [PaymentController::class, 'process'])->name('bayar.proses');
});

Route::get('/order-history', [PaymentController::class, 'history'])->name('order.history')->middleware('auth');



Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
Route::post('/events/{id}/close', [EventController::class, 'close'])->name('events.close');

use App\Http\Controllers\AdminController;
// use App\Http\Controllers\FinanceController;

Route::get('/kelola-finance', [AdminController::class, 'kelolaFinance'])->name('kelola.finance');
Route::get('/kelola-committee', [AdminController::class, 'kelolaCommittee'])->name('kelola.committee');

// routes/web.php
// Route::post('/finance/users', [FinanceController::class, 'store'])->name('finance.users.store');



use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FinanceDashboardController;
use App\Http\Controllers\CommitteeDashboardController;

// Route::get('/committee/dashboard', [CommitteeDashboardController::class, 'index'])->name('committee.dashboard');
Route::get('/committee/dashboard', [EventController::class, 'index'])->name('committee.dashboard');



Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Route::get('/finance/dashboard', [FinanceDashboardController::class, 'index'])->name('finance.dashboard');
// routes/web.php


Route::get('/finance/dashboard', [FinanceDashboardController::class, 'index'])->name('finance.dashboard');

Route::post('/finance/verify/{registration}', [FinanceDashboardController::class, 'verify'])->name('finance.verify');


use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('welcome');
})->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
