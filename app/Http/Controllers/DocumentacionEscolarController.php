<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiDocumentacionEscolarService;
use App\Services\PublicacionBecaService;

class DocumentacionEscolarController extends Controller
{
    protected $publicacionBecaService;
    protected $apiDocumentacionService;

    public function __construct(PublicacionBecaService $publicacionBecaService, ApiDocumentacionEscolarService $apiDocumentacionService)
    {
        $this->publicacionBecaService = $publicacionBecaService;
        $this->apiDocumentacionService = $apiDocumentacionService;
    }
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
    public function consultarPorMatricula(Request $request)
    {
        $matricula = $request->input('matricula');

        $datosGenerales = $this->apiDocumentacionService->obtenerDatosGenerales($matricula);
        $documentacion = $this->apiDocumentacionService->obtenerDocumentacion($matricula);
        $adeudos = $this->apiDocumentacionService->obtenerAdeudos($matricula);
        $info = $this->apiDocumentacionService->obtenerInformacionEstudiante($matricula);
        $calificaciones = $this->apiDocumentacionService->obtenerCalificaciones($matricula);
        $promedios = $this->apiDocumentacionService->obtenerPromedios($matricula);

        if (!$adeudos && !$documentacion && !$datosGenerales) {
            return back()->with('error', 'No se pudo obtener información. El servidor puede estar inactivo.');
        }

        return view('estudiantes.resultado', compact('datosGenerales', 'documentacion', 'adeudos', 'info', 'calificaciones', 'promedios'));
    }

    public function consultarInfoEstudianteYBeca(Request $request)
    {
        $matricula = $request->input('matricula');
        $publicacion_beca = $request->input('publicacion_beca');

        $datosGenerales = $this->apiDocumentacionService->obtenerDatosGenerales($matricula);
        $documentacion = $this->apiDocumentacionService->obtenerDocumentacion($matricula);
        $adeudos = $this->apiDocumentacionService->obtenerAdeudos($matricula);
        $info = $this->apiDocumentacionService->obtenerInformacionEstudiante($matricula);
        $calificaciones = $this->apiDocumentacionService->obtenerCalificaciones($matricula);
        $promedios = $this->apiDocumentacionService->obtenerPromedios($matricula);

        $publicacionBeca = $this->publicacionBecaService->obtenerInfoPorId($publicacion_beca);

        if (!$publicacionBeca) {
            return back()->withErrors('La publicación de beca no existe.');
        }       

        if (!$adeudos && !$documentacion && !$datosGenerales && !$info && !$calificaciones && !$promedios) {
            return back()->with('error', 'No se pudo obtener información. El servidor puede estar inactivo.');
        }

        return view('postulacion-beca.show', array_merge(
            compact('datosGenerales', 'documentacion', 'adeudos', 'info', 'calificaciones', 'promedios'),
            $publicacionBeca
        ));
    }

    /**
     * Handle the student documentation consultation with period.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\ApiDocumentacionEscolarService  $api
     * @return \Illuminate\View\View
     */
    public function consultarPorMatriculaYPeriodo(Request $request)
    {
        $matricula = $request->input('matricula');

        $periodo = [
            'mes_inicio' => $request->input('mes_inicio'),
            'mes_fin' => $request->input('mes_fin'),
            'anio' => $request->input('anio'),
        ];

        $datosGenerales = $this->apiDocumentacionService->obtenerDatosGenerales($matricula);
        $documentacion = $this->apiDocumentacionService->obtenerDocumentacion($matricula);
        $adeudos = $this->apiDocumentacionService->obtenerAdeudos($matricula);
        $info = $this->apiDocumentacionService->obtenerInformacionEstudiante($matricula, $periodo);
        $calificaciones = $this->apiDocumentacionService->obtenerCalificaciones($matricula, $periodo);
        $promedios = $this->apiDocumentacionService->obtenerPromedios($matricula, $periodo);

        if (isset($promedios['matricula'])) {
            $promedios = [$promedios];
        }

        if (!$info && !$calificaciones && !$promedios) {
            return back()->with('error', 'No se pudo obtener información. El servidor puede estar inactivo.');
        }

        return view('estudiantes.resultado', compact('datosGenerales', 'documentacion', 'adeudos', 'info', 'calificaciones', 'promedios'));
    }
}
