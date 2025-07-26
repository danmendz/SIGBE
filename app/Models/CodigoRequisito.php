<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodigoRequisito extends Model
{
    protected $table = 'codigos_requisitos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo_validacion',
    ];
}
