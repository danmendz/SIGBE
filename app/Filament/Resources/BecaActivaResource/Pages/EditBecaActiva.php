<?php

namespace App\Filament\Resources\BecaActivaResource\Pages;

use App\Filament\Resources\BecaActivaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBecaActiva extends EditRecord
{
    protected static string $resource = BecaActivaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
