<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos';
    protected $fillable = [
        'mes_inicio',
        'mes_fin',
        'anio',
    ];

    // Atributos calculados
    protected $appends = [
        'nombre_periodo',
        'mes_inicio_nombre',
        'mes_fin_nombre'
    ];

    // Array de meses
    protected static $meses = [
        1 => 'Enero', 
        2 => 'Febrero', 
        3 => 'Marzo', 
        4 => 'Abril',
        5 => 'Mayo', 
        6 => 'Junio', 
        7 => 'Julio', 
        8 => 'Agosto',
        9 => 'Septiembre', 
        10 => 'Octubre', 
        11 => 'Noviembre', 
        12 => 'Diciembre',
    ];

    public function getMesInicioNombreAttribute(): string
    {
        return self::$meses[$this->mes_inicio] ?? 'Mes inválido';
    }

    public function getMesFinNombreAttribute(): string
    {
        return self::$meses[$this->mes_fin] ?? 'Mes inválido';
    }

    public function getNombrePeriodoAttribute(): string
    {
        return self::$meses[$this->mes_inicio] . '-' . self::$meses[$this->mes_fin] . ' ' . $this->anio;
    }
}