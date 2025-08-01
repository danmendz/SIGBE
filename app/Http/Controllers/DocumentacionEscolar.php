<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiDocumentacionEscolarService;

class DocumentacionEscolar extends Controller
{
    /**
     * Display the form for student documentation consultation.
     *
     * @return \Illuminate\View\View
     */
    public function formulario()
    {
        return view('estudiantes.consulta');
    }

    /**
     * Handle the student documentation consultation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\ApiDocumentacionEscolarService  $api
     * @return \Illuminate\View\View
     */
    public function consultarPorMatricula(Request $request, ApiDocumentacionEscolarService $api)
    {
        $matricula = $request->input('matricula');

        $datosGenerales = $api->obtenerDatosGenerales($matricula);
        $documentacion = $api->obtenerDocumentacion($matricula);
        $adeudos = $api->obtenerAdeudos($matricula);
        $info = $api->obtenerInformacionEstudiante($matricula);
        $calificaciones = $api->obtenerCalificaciones($matricula);
        $promedios = $api->obtenerPromedios($matricula);

        if (!$adeudos && !$documentacion && !$datosGenerales) {
            return back()->withErrors('No se pudo obtener información. El servidor puede estar inactivo.');
        }

        return view('estudiantes.resultado', compact('datosGenerales', 'documentacion', 'adeudos', 'info', 'calificaciones', 'promedios'));
    }

    /**
     * Handle the student documentation consultation with period.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\ApiDocumentacionEscolarService  $api
     * @return \Illuminate\View\View
     */
    public function consultarPorMatriculaYPeriodo(Request $request, ApiDocumentacionEscolarService $api)
    {
        $matricula = $request->input('matricula');

        $periodo = [
            'mes_inicio' => $request->input('mes_inicio'),
            'mes_fin' => $request->input('mes_fin'),
            'anio' => $request->input('anio'),
        ];

        $datosGenerales = $api->obtenerDatosGenerales($matricula);
        $documentacion = $api->obtenerDocumentacion($matricula);
        $adeudos = $api->obtenerAdeudos($matricula);
        $info = $api->obtenerInformacionEstudiante($matricula, $periodo);
        $calificaciones = $api->obtenerCalificaciones($matricula, $periodo);
        $promedios = $api->obtenerPromedios($matricula, $periodo);

        if (isset($promedios['matricula'])) {
            $promedios = [$promedios];
        }

        if (!$info && !$calificaciones && !$promedios) {
            return back()->withErrors('No se pudo obtener información. El servidor puede estar inactivo.');
        }

        return view('estudiantes.resultado', compact('datosGenerales', 'documentacion', 'adeudos', 'info', 'calificaciones', 'promedios'));
    }
}
