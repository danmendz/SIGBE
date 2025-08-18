<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\{
    AdminController,
    DocumentacionController,
    ConvocatoriaController,
    AdeudoController,
    UsuarioController,
    PostulacionController,
    ReporteController,
    PerfilController,
    RolController
};

// RUTA PRINCIPAL
Route::get('/', function () {
    return view('welcome');
});

// Middleware de autenticación
Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // DOCUMENTACIÓN
    Route::get('/documentacion', [DocumentacionController::class, 'index'])->name('documentacion.index');

    // CONVOCATORIAS
    Route::get('/convocatorias', [ConvocatoriaController::class, 'index'])->name('convocatorias.index');

    // ADEUDOS
    Route::get('/adeudos', [AdeudoController::class, 'index'])->name('adeudos.index');

    // USUARIOS
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

    // POSTULACIONES
    Route::get('/postulaciones', [PostulacionController::class, 'index'])->name('postulaciones.index');

    // REPORTES
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

    // PERFIL DE USUARIO
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

    // ROLES Y PERMISOS
    Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
    Route::get('/roles/{id}/edit', [RolController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [RolController::class, 'update'])->name('roles.update');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// DEMO de dashboards sin necesidad de autenticación ni BD
Route::get('/demo/admin', function () {
    return view('dashboard.admin');
});

Route::get('/demo/estudiante', function () {
    return view('dashboard.estudiante');
});

Route::get('/demo/revisor', function () {
    return view('dashboard.revisor');
});
// ====== DASHBOARDS DEMO ======
Route::get('/demo/admin', function () {
    return view('dashboard.admin');
});

Route::get('/demo/estudiante', function () {
    return view('dashboard.estudiante');
});

Route::get('/demo/revisor', function () {
    return view('dashboard.revisor');
});

// ====== MODULOS DEMO ESTUDIANTE ======
Route::get('/demo/estudiante/postulaciones', function () {
    return view('modules.estudiante.postulaciones');
});

Route::get('/demo/estudiante/documentacion', function () {
    return view('modules.estudiante.documentacion');
});

Route::get('/demo/estudiante/adeudos', function () {
    return view('modules.estudiante.adeudos');
});

// ====== MODULOS DEMO REVISOR ======
Route::get('/demo/revisor/convocatorias', function () {
    return view('modules.revisor.convocatorias');
});

Route::get('/demo/revisor/documentacion', function () {
    return view('modules.revisor.documentacion');
});

Route::get('/demo/revisor/reportes', function () {
    return view('modules.revisor.reportes');
});
require __DIR__.'/auth.php';
