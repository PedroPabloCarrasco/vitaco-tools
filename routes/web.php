<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\VisitController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');

/*
|--------------------------------------------------------------------------
| TOOLS MODULE
|--------------------------------------------------------------------------
*/
Route::prefix('tools')->group(function () {

    Route::get('/comunicado-express', [ComunicadoController::class, 'index'])
        ->name('tools.comunicado');

    Route::post('/comunicado-express', [ComunicadoController::class, 'preview'])
        ->name('tools.comunicado.preview');

    Route::post('/comunicado-express/pdf', [ComunicadoController::class, 'pdf'])
        ->name('tools.comunicado.pdf');

    Route::post('/comunicado-express/image', [ComunicadoController::class, 'image'])
        ->name('tools.comunicado.image');

    Route::view('/qr-visitas', 'tools.qr-visitas')
        ->name('tools.qr-visitas');

    Route::view('/actas-ia', 'tools.actas-ia')
        ->name('tools.actas-ia');

    Route::view('/carteles', 'tools.carteles')
        ->name('tools.carteles');
});

/*
|--------------------------------------------------------------------------
| VISITS MODULE (VITACO)
|--------------------------------------------------------------------------
*/
Route::prefix('visits')->group(function () {

    // LISTADO
    Route::get('/', [VisitController::class, 'index'])
        ->name('visits.index');

    // FORM CREATE
    Route::get('/create', [VisitController::class, 'create'])
        ->name('visits.create');

    // STORE
    Route::post('/', [VisitController::class, 'store'])
        ->name('visits.store');

    // VALIDACIÓN QR (IMPORTANTE: antes de {id})
    Route::get('/validate/{token}', [VisitController::class, 'validateVisit'])
        ->name('visits.validate');

    // SHOW (DEBE IR DESPUÉS DE validate)
    Route::get('/show/{id}', [VisitController::class, 'show'])
        ->name('visits.show');
});

/*
|--------------------------------------------------------------------------
| TEST ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/test-qr', function () {
    return QrCode::size(250)->generate(url('/'));
});
