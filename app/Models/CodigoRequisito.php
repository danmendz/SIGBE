<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoRequisito extends Model
{
    use HasFactory;
    
    protected $table = 'codigo_requisitos';

    protected $fillable = [
        'codigo',
        'descripcion',
        'tipo_validacion',
    ];

    public function tipoBecas()
    {       
        return $this->belongsToMany(TipoBeca::class, 'requisito_becas', 'codigo_requisito_id', 'tipo_beca_id');
    }
}
