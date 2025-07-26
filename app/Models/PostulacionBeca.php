<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulacionBeca extends Model
{
    use HasFactory;

    protected $table = 'postulaciones_beca';

    protected $fillable = [
        'beca_publicada_id',
        'matricula',
        'fecha_postulacion',
        'estatus',
        'motivo_rechazo',
    ];

    public function publicacionBeca()
    {
        return $this->belongsTo(PublicacionBeca::class, 'beca_publicada_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'estudiante_id');
    }
}
