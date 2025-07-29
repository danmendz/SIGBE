<?php

namespace App\Filament\Resources\DatoSocioeconomicoResource\Pages;

use App\Filament\Resources\DatoSocioeconomicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDatoSocioeconomico extends EditRecord
{
    protected static string $resource = DatoSocioeconomicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
