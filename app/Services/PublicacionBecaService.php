<?php

namespace App\Services;

use App\Models\PublicacionBeca;
use App\Models\PostulacionBeca;

class PublicacionBecaService
{
    /**
     * Obtener la información de una publicación de beca por su ID
     *
     * @param int $idPublicacion
     * @return array|null
     */
    public function obtenerInfoPublicacionPorId(int $idPublicacion): ?array
    {
        $publicacionBeca = PublicacionBeca::find($idPublicacion);
        if (!$publicacionBeca) {
            return null;
        }

        return [
            'publicacionBeca' => $publicacionBeca,
            'tipoBeca' => $publicacionBeca->tipoBeca,
            'periodo' => $publicacionBeca->periodo,
            'requisitos' => $publicacionBeca->tipoBeca->requisitos,
        ];
    }

    public function obtenerInfoPostulacionPorId(int $idPostulacion): ?array
    {
        $postulacionBeca = PostulacionBeca::find($idPostulacion);
        if (!$postulacionBeca) {
            return null;
        }

        return [
            'beca_publicada_id' => $postulacionBeca->beca_publicada_id,
            'estudiante_id' => $postulacionBeca->estudiante_id,
            'fecha_postulacion' => $postulacionBeca->fecha_postulacion,
            'estatus' => $postulacionBeca->estatus,
            'datos_socioeconomicos' => $postulacionBeca->datos_socioeconomicos,
            'motivo_rechazo' => $postulacionBeca->motivo_rechazo,
        ];
    }
}