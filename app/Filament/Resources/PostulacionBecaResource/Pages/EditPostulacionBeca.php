<?php

namespace App\Filament\Resources\PostulacionBecaResource\Pages;

use App\Filament\Resources\PostulacionBecaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostulacionBeca extends EditRecord
{
    protected static string $resource = PostulacionBecaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
