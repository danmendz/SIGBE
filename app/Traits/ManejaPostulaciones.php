<?php

namespace App\Traits;

use App\Models\BecaActiva;
use App\Models\BitacoraPostulacion;
use App\Models\PostulacionBeca;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

trait ManejaPostulaciones
{
    /**
     * Encuentra una postulación o devuelve error
     * 
     * @param int $id ID de la postulación
     * @return mixed PostulaciónBeca|RedirectResponse
     */
    protected function encontrarPostulacionOError($id)
    {
        $postulacion = PostulacionBeca::find($id);
        
        if (!$postulacion) {
            return Redirect::back()->with('error', 'Postulación no encontrada.');
        }
        
        return $postulacion;
    }

    /**
     * Verifica si la postulación ya fue procesada
     * 
     * @param PostulacionBeca $postulacion
     * @return bool
     */
    protected function postulacionYaProcesada($postulacion)
    {
        return in_array($postulacion->estatus, ['aprobada', 'rechazada']);
    }

    /**
     * Registra una acción en la bitácora
     * 
     * @param int $postulacionId
     * @param string $accion
     * @return void
     */
    protected function registrarBitacora($postulacionId, $accion)
    {
        BitacoraPostulacion::create([
            'postulacion_id'    => $postulacionId,
            'usuario_reviso'    => Auth::id(),
            'actualizado_el'    => Carbon::now(),
            'accion' => $accion,
        ]);
    }

    protected function registrarBecaActiva($postulacion, $fechaAutorizacion, $fechaTerminacion = null, $motivoBaja = null, $fechaBaja = null)
    {
        BecaActiva::create([
            'estudiante_id'     => $postulacion->estudiante_id,
            'periodo_beca_id'   => $postulacion->publicacionBeca->periodo->id,
            'tipo_beca_id'      => $postulacion->publicacionBeca->tipoBeca->id,
            'fecha_solicitud'   => $postulacion->fecha_postulacion,
            'fecha_autorizacion'=> $fechaAutorizacion,
            'fecha_terminacion' => $fechaTerminacion ?? $postulacion->publicacionBeca->periodo->mes_fin_nombre. ' ' . $postulacion->publicacionBeca->periodo->anio,
            'motivo_baja'       => $motivoBaja,
            'fecha_baja'        => $fechaBaja,
        ]);
    }

    /**
     * Verifica si el estudiante ya está postulado
     * 
     * @param int $becaId
     * @param int $estudianteId
     * @return bool
     */
    protected function yaEstaPostulado($becaId, $estudianteId)
    {
        return PostulacionBeca::where('beca_publicada_id', $becaId)
            ->where('estudiante_id', $estudianteId)
            ->exists();
    }
}