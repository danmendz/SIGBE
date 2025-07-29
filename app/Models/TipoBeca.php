<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBeca extends Model
{
    use HasFactory;

    protected $table = 'tipo_becas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'porcentaje_descuento',
    ];

    public function requisitos()
    {
        return $this->belongsToMany(CodigoRequisito::class, 'requisito_becas', 'tipo_beca_id', 'codigo_requisito_id');
    }

}
