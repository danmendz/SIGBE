<?php

use App\Http\Controllers\BecaActivaController;
use App\Http\Controllers\BitacoraPostulacionesController;
use App\Http\Controllers\DocumentacionEscolar;
use App\Http\Controllers\PostulacionBecaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacionBecaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

// Rutas para aprobar y rechazar postulaciones de becas
Route::post('/postulacion-becas/{id}/rechazar', [PostulacionBecaController::class, 'rechazarBeca'])->name('postulacion-becas.rechazar');
Route::post('/postulacion-becas/{id}/aprobar', [PostulacionBecaController::class, 'aprobarBeca'])->name('postulacion-becas.aprobar');

// Rutas de recursos
Route::resource('postulacion-becas', PostulacionBecaController::class);
Route::resource('beca-activas', BecaActivaController::class);
Route::resource('publicacion-becas', PublicacionBecaController::class);
Route::resource('bitacora-postulaciones', BitacoraPostulacionesController::class);

// Rutas para postularse a una beca
Route::post('/postularse/{id}', [\App\Http\Controllers\PostulacionBecaController::class, 'postularse'])
    ->name('postularse.beca')
    ->middleware('auth');

Route::get('/consulta', [DocumentacionEscolar::class, 'formulario'])->name('consulta.formulario');
Route::post('/consulta/matricula', [DocumentacionEscolar::class, 'consultarPorMatricula'])->name('consulta.matricula');
Route::post('/consulta/completa', [DocumentacionEscolar::class, 'consultarPorMatriculaYPeriodo'])->name('consulta.completa');


require __DIR__ . '/auth.php';
