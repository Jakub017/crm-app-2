<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::middleware('auth:sanctum', config('jetstream.auth_session'), 'verified',)->group(function () {
    Route::controller(ClientController::class)->group(function() {
        Route::get('/klienci', 'index')->name('client.index');
        Route::get('/klienci/dodaj', 'create')->name('client.create');
        Route::post('/klienci', 'store')->name('client.store');
        Route::get('/klienci/{client}', 'show')->name('client.show');
        Route::get('/klienci/{client}/edytuj', 'edit')->name('client.edit');
        Route::put('/klienci/{client}', 'update')->name('client.update');
        Route::delete('/klienci/{client}', 'destroy')->name('client.destroy');
        Route::post('/klienci/szukaj', 'search')->name('client.search');
    });

    Route::controller(TaskController::class)->group(function() {
        Route::get('/zadania', 'index')->name('task.index');
        Route::get('/zadania/dodaj', 'create')->name('task.create');
        Route::post('/zadania', 'store')->name('task.store');
        Route::get('/zadania/{task}', 'show')->name('task.show');
        Route::get('/zadania/{task}/edytuj', 'edit')->name('task.edit');
        Route::put('/zadania/{task}', 'update')->name('task.update');
        Route::put('/zadania/{task}', 'check')->name('task.check');
        Route::delete('/zadania/{task}', 'destroy')->name('task.destroy');
        Route::post('/zadania/szukaj', 'search')->name('task.search');
    });

    Route::controller(InvoiceController::class)->group(function() {
        Route::get('/faktury', 'index')->name('invoice.index');
        Route::get('/faktury/dodaj', 'create')->name('invoice.create');
        Route::post('/faktury', 'store')->name('invoice.store');
        Route::get('/faktury/{invoice}', 'show')->name('invoice.show');
        Route::get('/faktury/{invoice}/edytuj', 'edit')->name('invoice.edit');
        Route::put('/faktury/{invoice}', 'update')->name('invoice.update');
        Route::delete('/faktury/{invoice}', 'destroy')->name('invoice.destroy');
        Route::post('/faktury/szukaj', 'search')->name('invoice.search');
    });
});
