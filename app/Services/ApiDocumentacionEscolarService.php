<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class ApiDocumentacionEscolarService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_ESCOLAR_URL', 'http://127.0.0.1:8001/api');
    }

    protected function get($url, $params = [])
    {
        try {
            $response = Http::get($url, $params);

            if ($response->successful()) {
                return $response->json();
            }

            return null;

        } catch (ConnectionException $e) {
            return null;
        }
    }

    public function obtenerInformacionEstudiante($matricula, $periodo = null)
    {
        $url = "{$this->baseUrl}/info-estudiante/matricula/{$matricula}/periodo";
        return $this->get($url, $periodo ?? []);
    }

    public function obtenerCalificaciones($matricula, $periodo = null)
    {
        $url = $periodo
            ? "{$this->baseUrl}/calificaciones/matricula/{$matricula}/periodo"
            : "{$this->baseUrl}/calificaciones/matricula/{$matricula}";

        return $this->get($url, $periodo ?? []);
    }

    public function obtenerPromedios($matricula, $periodo = null)
    {
        $url = $periodo
            ? "{$this->baseUrl}/promedios/matricula/{$matricula}/periodo"
            : "{$this->baseUrl}/promedios/matricula/{$matricula}";

        return $this->get($url, $periodo ?? []);
    }

    public function obtenerAdeudos($matricula)
    {
        $url = "{$this->baseUrl}/adeudos/matricula/{$matricula}";
        return $this->get($url);
    }

    public function obtenerDocumentacion($matricula)
    {
        $url = "{$this->baseUrl}/documentacion/matricula/{$matricula}";
        return $this->get($url);
    }

    public function obtenerDatosGenerales($matricula)
    {
        $url = "{$this->baseUrl}/estudiantes/matricula/{$matricula}";
        return $this->get($url);
    }
}