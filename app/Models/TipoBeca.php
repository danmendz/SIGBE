<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoBeca extends Model
{
    protected $table = 'tipos_beca';

    protected $fillable = [
        'nombre',
        'descripcion',
        'porcentaje_descuento',
    ];
}
