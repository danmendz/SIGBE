<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitoBeca extends Model
{
    protected $table = 'requisitos_beca';

    protected $fillable = [
        'tipo_beca_id',
        'codigo_requisito_id',
    ];

    public function tipoBeca()
    {
        return $this->belongsTo(TipoBeca::class, 'tipo_beca_id');
    }

    public function codigoRequisito()
    {
        return $this->belongsTo(CodigoRequisito::class, 'codigo_requisito_id');
    }
}
