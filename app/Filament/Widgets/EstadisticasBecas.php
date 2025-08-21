<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\PostulacionBeca;
use Carbon\Carbon;

class EstadisticasBecas extends ChartWidget
{
    protected static ?string $heading = 'Estadísticas de Becas';

    protected function getData(): array
    {
         $meses = collect(range(1, 12))->map(fn($m) => Carbon::create()->month($m)->format('F'));
        $data = $meses->map(function($mes, $index) {
            return PostulacionBeca::whereMonth('fecha_postulacion', $index + 1)->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Postulaciones por mes',
                    'data' => $data,
                ],
            ],
            'labels' => $meses,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
