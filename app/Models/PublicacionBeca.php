<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionBeca extends Model
{
    use HasFactory;

    protected $table = 'publicacion_beca';

    protected $fillable = [
        'requisitos_beca_id',
        'periodo_id',
        'fecha_inicio',
        'fecha_fin',
        'requisitos',
    ];

    public function requisitosBeca()
    {
        return $this->belongsTo(RequisitoBeca::class, 'requisitos_beca_id');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }
}
