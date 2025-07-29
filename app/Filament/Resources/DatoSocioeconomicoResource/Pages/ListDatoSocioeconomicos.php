<?php

namespace App\Filament\Resources\DatoSocioeconomicoResource\Pages;

use App\Filament\Resources\DatoSocioeconomicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDatoSocioeconomicos extends ListRecords
{
    protected static string $resource = DatoSocioeconomicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
