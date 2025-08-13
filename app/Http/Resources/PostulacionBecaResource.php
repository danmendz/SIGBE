<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostulacionBecaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fecha_postulacion' => $this->fecha_postulacion,
            'estatus' => $this->estatus,
            'motivo_rechazo' => $this->motivo_rechazo,

            'alumno' => [
                'id' => $this->usuario?->id,
                'matricula' => $this->usuario?->matricula,
                'email' => $this->usuario?->email,
            ],

            'tipo_beca' => [
                'id' => $this->publicacionBeca?->tipoBeca?->id,
                'nombre' => $this->publicacionBeca?->tipoBeca?->nombre,
                'descripcion' => $this->publicacionBeca?->tipoBeca?->descripcion,
                'porcentaje_descuento' => $this->publicacionBeca?->tipoBeca?->porcentaje_descuento,
                'requisitos_beca' => $this->publicacionBeca?->tipoBeca?->requisitos->map(function ($req) {
                    return [
                        'codigo' => $req->codigo,
                        'descripcion' => $req->descripcion,
                    ];
                }),
            ],

            'periodo' => [
                'id' => $this->publicacionBeca?->periodo?->id,
                'nombre' => $this->publicacionBeca?->periodo?->nombre_periodo ?? null,
                'mes_inicio' => $this->publicacionBeca?->periodo?->mes_inicio_nombre ?? null,
                'mes_fin' => $this->publicacionBeca?->periodo?->mes_fin_nombre ?? null,
                'anio' => $this->publicacionBeca?->periodo?->anio ?? null,
            ],
        ];
    }
}
