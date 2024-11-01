<?php

use App\Http\Controllers\MetodoIngenuoController;
use App\Http\Controllers\MetodoMediaController;
use App\Http\Controllers\MetodoMediaMovilController;
use App\Http\Controllers\MetodoDerivadaController;
use App\Http\Controllers\MetodoIngenuoEstacionalController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Método Ingenuo
    Route::get('/metodo/ingenuo', [MetodoIngenuoController::class, 'index'])->name('metodo.ingenuo');
    Route::post('/metodo/ingenuo/calculate', [MetodoIngenuoController::class, 'calculate'])->name('metodo.ingenuo.calculate');

    // Método de la Media
    Route::get('/metodo/media', [MetodoMediaController::class, 'index'])->name('metodo.media');
    Route::post('/metodo/media/calculate', [MetodoMediaController::class, 'calculate'])->name('metodo.media.calculate');

    // Método de la Media Móvil Simple
    Route::get('/metodo/media_movil', [MetodoMediaMovilController::class, 'index'])->name('metodo.media_movil');
    Route::post('/metodo/media_movil/calculate', [MetodoMediaMovilController::class, 'calculate'])->name('metodo.media_movil.calculate');

    // Método de la Derivada
    Route::get('/metodo/derivada', [MetodoDerivadaController::class, 'index'])->name('metodo.derivada');
    Route::post('/metodo/derivada/calculate', [MetodoDerivadaController::class, 'calculate'])->name('metodo.derivada.calculate');

    // Método Ingenuo Estacional
    Route::get('/metodo/ingenuo_estacional', [MetodoIngenuoEstacionalController::class, 'index'])->name('metodo.ingenuo_estacional');
    Route::post('/metodo/ingenuo_estacional/calculate', [MetodoIngenuoEstacionalController::class, 'calculate'])->name('metodo.ingenuo_estacional.calculate');
});
