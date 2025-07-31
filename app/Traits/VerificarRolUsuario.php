<?php

namespace App\Traits;

use App\Models\BitacoraPostulacion;
use App\Models\PostulacionBeca;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

trait VerificarRolUsuario
{
    /**
     * Verifica si el usuario tiene el rol requerido.
     *
     * @param string $rol
     * @return bool
     */
    public function verificarRol($rol)
    {
        return Auth::check() && Auth::user()->hasRole($rol);
    }

    /**
     * Redirige al usuario si no tiene el rol requerido.
     *
     * @param string $rol
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function redirigirSiNoTieneRol($rol)
    {
        if (!$this->verificarRol($rol)) {
            return Redirect::back()->with('error', 'Acceso denegado. Rol no autorizado.');
        }
        return null;
    }
}