<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulacionBeca extends Model
{
    use HasFactory;

    protected $table = 'postulacion_becas';

    protected $fillable = [
        'beca_publicada_id',
        'estudiante_id',
        'fecha_postulacion',
        'estatus',
        'datos_socioeconomicos',
        'motivo_rechazo',
    ];

    protected $casts = [
        'datos_socioeconomicos' => 'array',
        'fecha_postulacion' => 'date',
    ];

    public function publicacionBeca()
    {
        return $this->belongsTo(PublicacionBeca::class, 'beca_publicada_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'estudiante_id');
    }

    public function bitacoras()
    {
        return $this->hasMany(BitacoraPostulacion::class, 'postulacion_id');
    }

    public function requisitosVerificados()
    {
        return $this->hasMany(RequisitoVerificado::class, 'postulacion_id');
    }

    public function comprobantesIngresos()
    {
        return $this->hasMany(ComprobanteIngreso::class, 'postulacion_id');
    }

}
