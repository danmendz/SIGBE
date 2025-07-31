<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BecaActiva extends Model
{
    use HasFactory;

    protected $table = 'beca_activas';

    protected $fillable = [
        'estudiante_id',
        'periodo_beca_id',
        'tipo_beca_id',
        'fecha_solicitud',
        'fecha_autorizacion',
        'fecha_terminacion',
        'motivo_baja',
        'fecha_baja',
        'activa',
    ];

    public function tipoBeca(): BelongsTo
    {
        return $this->belongsTo(TipoBeca::class, 'tipo_beca_id');
    }

    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'periodo_beca_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'estudiante_id');
    }
}
