<?php

namespace App\Filament\Resources\PublicacionBecaResource\Pages;

use App\Filament\Resources\PublicacionBecaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPublicacionBeca extends EditRecord
{
    protected static string $resource = PublicacionBecaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
