<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ClientController;

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
        Route::get('/dashboard/klienci', 'index')->name('client.index');
        Route::get('/dashboard/klienci/dodaj', 'create')->name('client.create');
        Route::post('/dashboard/klienci', 'store')->name('client.store');
        Route::get('/dashboard/klienci/{client}', 'show')->name('client.show');
        Route::get('/dashboard/klienci/{client}/edytuj', 'edit')->name('client.edit');
        Route::put('/dashboard/klienci/{client}', 'update')->name('client.update');
        Route::delete('/dashboard/klienci/{client}', 'destroy')->name('client.destroy');
    });
});
