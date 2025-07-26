<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitacoraPostulacion extends Model
{
    use HasFactory;

    protected $table = 'bitacora_postulaciones';

    protected $fillable = [
        'postulacion_id',
        'usuario_reviso',
        'actualizado_el',
        'accion',
    ];

    public function postulacion()
    {
        return $this->belongsTo(PostulacionBeca::class, 'postulacion_id');
    }

    public function revisor()
    {
        return $this->belongsTo(User::class, 'usuario_reviso');
    }
}
