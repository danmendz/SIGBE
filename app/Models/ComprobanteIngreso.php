<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteIngreso extends Model
{
    use HasFactory;

    protected $table = 'comprobante_ingresos';

    protected $fillable = [
        'postulacion_id',
        'tipo_documento',
        'emisor',
        'fecha_emision',
        'observaciones',
    ];

    public function postulacion()
    {
        return $this->belongsTo(PostulacionBeca::class, 'postulacion_id');
    }
}
