<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatoSocioeconomico extends Model
{
    protected $table = 'datos_socioeconomicos';

    protected $fillable = [
        'matricula',
        'ingreso_mensual',
        'tipo_vivienda',
        'dependiente',
        'ocupacion_dependiente',
        'dependientes_economicos',
        'estado_civil',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'matricula', 'matricula');
    }
}
