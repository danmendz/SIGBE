<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DatoSocioeconomico
 *
 * @property $id
 * @property $matricula
 * @property $ingreso_mensual
 * @property $tipo_vivienda
 * @property $dependiente
 * @property $ocupacion_dependiente
 * @property $dependientes_economicos
 * @property $estado_civil
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DatoSocioeconomico extends Model
{
    protected $table = 'dato_socioeconomicos';   
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'matricula',
        'ingreso_mensual',
        'tipo_vivienda',
        'dependiente',
        'ocupacion_dependiente',
        'dependientes_economicos',
        'estado_civil',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'matricula', 'matricula');
    }
}
