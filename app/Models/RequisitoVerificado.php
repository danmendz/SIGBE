<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoVerificado extends Model
{
    use HasFactory;

    protected $table = 'requisitos_verificados';

    protected $fillable = [
        'postulacion_id',
        'requisito_id',
        'cumplido',
        'observaciones',
    ];

    public function postulacion()
    {
        return $this->belongsTo(PostulacionBeca::class, 'postulacion_id');
    }

    public function requisito()
    {
        return $this->belongsTo(RequisitoBeca::class, 'requisito_id');
    }
}
