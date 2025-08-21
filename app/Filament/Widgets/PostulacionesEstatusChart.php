<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\PostulacionBeca;

class PostulacionesEstatusChart extends ChartWidget
{
    protected static ?string $heading = 'Estatus de Postulaciones';

    protected function getData(): array
    {
        $estatusCounts = PostulacionBeca::query()
            ->selectRaw('estatus, COUNT(*) as count')
            ->groupBy('estatus')
            ->pluck('count', 'estatus')
            ->toArray();

        return [
            'labels' => array_keys($estatusCounts),
            'datasets' => [
                [
                    'label' => 'Postulaciones',
                    'data' => array_values($estatusCounts),
                    'backgroundColor' => [
                        '#34D399',
                        '#FBBF24',
                        '#F87171',
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}