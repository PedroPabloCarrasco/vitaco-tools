<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComunicadoController;

Route::view('/', 'home')->name('home');

Route::prefix('tools')->group(function () {

    Route::get(
        '/comunicado-express',
        [ComunicadoController::class, 'index']
    )->name('tools.comunicado');

    Route::post(
        '/comunicado-express',
        [ComunicadoController::class, 'preview']
    )->name('tools.comunicado.preview');

    Route::post(
        '/comunicado-express/pdf',
        [ComunicadoController::class, 'pdf']
    )->name('tools.comunicado.pdf');

    // NUEVA RUTA IMAGEN
    Route::post(
        '/comunicado-express/image',
        [ComunicadoController::class, 'image']
    )->name('tools.comunicado.image');

    Route::view('/qr-visitas', 'tools.qr-visitas')
        ->name('tools.qr-visitas');

    Route::view('/actas-ia', 'tools.actas-ia')
        ->name('tools.actas-ia');

    Route::view('/carteles', 'tools.carteles')
        ->name('tools.carteles');
});
