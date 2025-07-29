<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionBeca extends Model
{
    use HasFactory;

    protected $table = 'publicacion_becas';

    protected $fillable = [
        'tipo_beca_id',
        'periodo_id',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function tipoBeca()
    {
        return $this->belongsTo(TipoBeca::class, 'tipo_beca_id');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }
}
