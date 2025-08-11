<?php

namespace App\Services;

use App\Models\PublicacionBeca;

class PublicacionBecaService
{
    /**
     * Obtener la información de una publicación de beca por su ID
     *
     * @param int $idPublicacion
     * @return array|null
     */
    public function obtenerInfoPorId(int $idPublicacion): ?array
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
}